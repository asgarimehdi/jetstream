<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Rule;

class EditUser extends Component
{
    /** @locked  */
    public $id;
    public $oldPassword;
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


    public $username = '';
    #[Rule('required|min:6|max:50')]
    public $name = '';
    #[Rule('sometimes|min:8')]
    public $password = '';

    public function rules()
    {
        return [
            'username' => 'required|string|max:20|min:3|unique:users,username,'.$this->id.',id',
        ];
    }
    public function updateUser()
    {
        //error handling try catch must implement
        $validatedData=$this->validate();
        if($this->password=='')
        {
            User::find($this->id)->update([
                'name'=>$validatedData['name'],
                'username' => $validatedData['username'],
                'role_id' => $validatedData['role_id'],
                'point_id' => $validatedData['point_id'],
                'group_id' => $validatedData['group_id'],
            ]);
        }
        else{
            User::find($this->id)->update([
                'name'=>$validatedData['name'],
                'username' => $validatedData['username'],
                'role_id' => $validatedData['role_id'],
                'point_id' => $validatedData['point_id'],
                'group_id' => $validatedData['group_id'],
                'password' => Hash::make($validatedData['password'])
            ]);
        }

        $this->reset(['id','name', 'username', 'password', 'role_id', 'group_id', 'point_id', 'center_id', 'county_id', 'type_id']);
        request()->session()->flash('success', 'کاربر با موفقیت ویرایش شد');
        $this->dispatch('close-modal', name: 'edit-user');
    }

    public function mount(User $selectedUser)
    {

        $this->id=$selectedUser->id;
        $this->name = $selectedUser->name;
        $this->username = $selectedUser->username;
        $this->role_id = $selectedUser->role_id;
        $this->group_id = $selectedUser->group_id;
        $this->point_id = $selectedUser->point_id;
        $this->center_id = $selectedUser->region_point->center_id;
        $this->county_id = $selectedUser->region_point->region_center->county_id;
        $this->type_id = $selectedUser->region_point->region_center->type_id;
        $this->oldPassword = $selectedUser->password;
//        $this->password_confirmation = $selectedUser->password;
        $this->roles = \App\Models\Roles::all();
        $this->groups = \App\Models\Groups::all();
        $this->counties = \App\Models\Region_counties::all();
        $this->types = \App\Models\Region_types::all();
        $this->centers = \App\Models\Region_centers::where('county_id', $this->county_id)->where('type_id', $this->type_id)->get();
        $this->points = \App\Models\Region_points::where('center_id', $this->center_id)->get();
    }

    public function updatedcountyId()
    {
        $this->reset(['point_id','points', 'center_id','centers', 'type_id']);
    }

    public function updatedtypeId()
    {
        $this->reset(['point_id','points', 'center_id','centers']);
        $this->centers = \App\Models\Region_centers::where('county_id', $this->county_id)->where('type_id', $this->type_id)->get();
    }

    public function updatedcenterId()
    {
        $this->reset(['point_id','points']);
        $this->points = \App\Models\Region_points::where('center_id', $this->center_id)->get();
    }

    public function render()
    {
        return view('livewire.edit-user');
    }

}
