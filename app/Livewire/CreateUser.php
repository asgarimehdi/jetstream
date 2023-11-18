<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Rule;
class CreateUser extends Component
{
    public $roles = '';
    public $role_id = '';
    public $groups = '';
    public $group_id = '';
    public $types = '';
    public $type_id = '';
    public $counties = '';
    public $county_id = '';
    public $centers = '';
    public $center_id = '';
    public $points = '';
    public $point_id = '';

    #[Rule('required|min:2|max:50')]
    public $username = '';
    #[Rule('required|min:2|max:50')]
    public $name = '';
    #[Rule('required|min:2|max:50')]
    public $password = '';

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
         $this->reset(['name','username','password','role_id','group_id','point_id','center_id','county_id','type_id']);
        request()->session()->flash('success', 'کاربر با موفقیت اضافه شد');
        $this->dispatch('close-modal',name:'new-user');
    }

    public function mount()
    {
        $this->roles = \App\Models\Roles::all();
        $this->groups = \App\Models\Groups::all();
        $this->counties = \App\Models\Region_counties::all();

    }

    public function updatedcountyId()
    {
        $this->types = \App\Models\Region_types::all();
        $this->reset(['point_id','center_id','type_id']);
    }

    public function updatedtypeId()
    {
        $this->reset(['point_id','center_id']);
        $this->centers = \App\Models\Region_centers::
        where('county_id', $this->county_id)
            ->where('type_id', $this->type_id)
            ->get();
    }

    public function updatedcenterId()
    {
        $this->reset(['point_id']);
        $this->points = \App\Models\Region_points::
        where('center_id', $this->center_id)
            ->get();
    }

    public function render()
    {
        return view('livewire.create-user');
    }

}
