<?php

namespace App\Livewire;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $role_id = '';
    #[Url(history: true)]
    public $group_id = '';
    #[Url(history: true)]
    public $county_id = '';
    #[Url(history: true)]
    public $sortBy = 'created_at';
    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Url()]
    public $perPage = 5;

    public $roles='';
    public $groups='';
    public $counties='';
    public $user_county_id='';

    public User $selectedUser;
    public function mount(){

        $this->roles=\App\Models\Roles::all();
        $this->groups=\App\Models\Groups::all();
        $this->counties=\App\Models\Region_counties::all();
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedRoleId()
    {
        $this->resetPage();
    }
    public function updatedGroupId()
    {
        $this->resetPage();
    }

    public function delete(User $user)
    {
        $user->delete();
    }

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) { // agar haman field sort shode bod hala bar ax sort kon
            $this->sortDir = ($this->sortDir == "ASC") ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $sortByField;
        $this->sortDir = 'DESC'; // pishfarz desc sort kon
    }
public function editUser(User $user){
    $this->selectedUser=$user;
    $this->dispatch('open-modal',name:'edit-user');
}

    public function render()
    {
        $user_county_id=Auth::user()->region_point->region_center->county_id;
        $county_id=$this->county_id;
        if (Gate::allows('isOstan')){
            $users = User::search($this->search)
                ->when($this->role_id !== '', function ($query) {
                    $query->where('role_id', $this->role_id);
                })
                ->when($this->group_id !== '', function ($query) {
                    $query->where('group_id', $this->group_id);
                })
                ->when($this->county_id !== '', function ($query) use ($county_id) {
                    $query->whereHas('Region_point.Region_center', function ($q) use ($county_id) {
                        // Query the name field in status table
                        $q->where('county_id', '=', $county_id); // '=' is optional
                    });
                })
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);
        }
        else {

            $users = User::search($this->search)
                ->when($this->role_id !== '', function ($query) {
                    $query->where('role_id', $this->role_id);
                })
                ->when($this->group_id !== '', function ($query) {
                    $query->where('group_id', $this->group_id);
                })
                ->whereHas('Region_point.Region_center', function ($q) use ($user_county_id) {
                    // Query the name field in status table
                    $q->where('county_id', '=', $user_county_id); // '=' is optional
                })
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage);
        }
        return view('livewire.users', ['users' => $users]);
    }
}
