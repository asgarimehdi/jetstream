<?php

namespace App\Livewire;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    public $sortBy = 'created_at';
    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Url()]
    public $perPage = 5;

    public $roles='';
    public function mount(){
        $this->roles=\App\Models\Roles::all();
    }
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedRoleId()
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


    public function render()
    {
        $users = User::search($this->search)
            ->when($this->role_id !== '', function ($query) {
                $query->where('role_id', $this->role_id);
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.users', ['users' => $users]);
    }
}
