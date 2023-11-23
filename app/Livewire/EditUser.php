<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Rule;

class EditUser extends Component
{
    //public User $selectedUser;
    public $roles = '';
    #[Rule('required')]
    public $role_id = '';
    public $groups = '';
    #[Rule('required')]
    public $group_id = '';
    public $types = '';
    #[Rule('required')]
    public $type_id = '';
    public $counties = '';
    #[Rule('required')]
    public $county_id = '';
    public $centers = '';
    #[Rule('required')]
    public $center_id = '';
    public $points = '';
    #[Rule('required')]
    public $point_id = '';

    #[Rule('required|min:3|max:50')]
    public $username = '';
    #[Rule('required|min:6|max:50')]
    public $name = '';
    #[Rule('required|min:8|confirmed')]
    public $password = '';

    public $password_confirmation = '';

    public function createUser()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'role_id' => $this->role_id,
            'point_id' => $this->point_id,
            'group_id' => $this->group_id,
            'password' => Hash::make($this->password)
        ]);
        $this->reset(['name', 'username', 'password', 'password_confirmation', 'role_id', 'group_id', 'point_id', 'center_id', 'county_id', 'type_id']);
        request()->session()->flash('success', 'کاربر با موفقیت اضافه شد');
        $this->dispatch('close-modal', name: 'new-user');
    }

    public function mount(User $selectedUser)
    {

        $this->name = $selectedUser->name;
        $this->username = $selectedUser->username;
        $this->role_id = $selectedUser->role_id;
        $this->group_id = $selectedUser->group_id;
        $this->point_id = $selectedUser->point_id;
        $this->center_id = $selectedUser->region_point->center_id;
        $this->county_id = $selectedUser->region_point->region_center->county_id;
        $this->type_id = $selectedUser->region_point->type_id;
        $this->roles = \App\Models\Roles::all();
        $this->groups = \App\Models\Groups::all();
        $this->counties = \App\Models\Region_counties::all();
        $this->types = \App\Models\Region_types::all();
        $this->centers = \App\Models\Region_centers::where('county_id', $this->county_id)->where('type_id', $this->type_id)->get();
        $this->points = \App\Models\Region_points::where('center_id', $this->center_id)->get();
    }

    public function updatedcountyId()
    {

        $this->reset(['point_id', 'center_id', 'type_id']);
    }

    public function updatedtypeId()
    {
        $this->reset(['point_id', 'center_id']);

    }

    public function updatedcenterId()
    {
        $this->reset(['point_id']);

    }

    public function render()
    {
        return view('livewire.create-user');
    }

}
