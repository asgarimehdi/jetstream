<?php

namespace App\Livewire;

use App\Models\Region_centers;
use App\Models\Region_types;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Rule;
class CreateUser extends Component
{
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

    #[Rule('required|string|max:20|min:3|unique:users,username,')]
    public $username = '';
    #[Rule('required|min:6|max:50')]
    public $name = '';
    #[Rule('required|min:8|confirmed')]
    public $password = '';

    public $password_confirmation = '';

    public function createUser()
    {
        //error handling try catch must implement
        $this->validate();
        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'role_id' => $this->role_id,
            'point_id' => $this->point_id,
            'group_id' => $this->group_id,
            'password' => Hash::make($this->password)
        ]);
        $this->reset(['name','username','password','password_confirmation','role_id','group_id','point_id','center_id','county_id','type_id']);
        request()->session()->flash('success', 'کاربر با موفقیت اضافه شد');
        $this->dispatch('close-modal',name:'new-user');
    }

    public function mount()
    {
        $this->roles = \App\Models\Roles::all();

        $this->counties = \App\Models\Region_counties::all();
    }
    public function updatedCountyId()
    {
        $this->groups = \App\Models\Groups::select('*')
        ->when($this->county_id=='9',function($query){
            $query->where('id','!=','6')->where('id','!=','8');
        })
        ->get();

        $this->reset(['point_id','center_id','type_id','group_id']);
    }
    public function updatedGroupId()
    {
        if($this->county_id=='9'){ //agar ostan bood
            $this->types = Region_types::select('*')->where('id',11)->get();
        }
        else{ // agar ostan nabood
        $this->types = Region_types::select('*')
//            ->when(($this->group_id=='1')or($this->group_id=='2')or($this->group_id=='3')or($this->group_id=='4')or($this->group_id=='5')or($this->group_id=='7'),function($query){
            ->when(in_array($this->group_id,[1,2,3,4,7]),function($query){ // agar grohe setadi bod faghat shabake neshan bede
//                $query->whereNotIn('id', [2,3,4,5,6,7,8,9,10,11,12]);
                $query->where('id',1);
            })
            ->when(($this->group_id=='6'),function($query){ // agar behvarz bod faghat khane va paygah
                $query->whereIn('id', [5,6]);
            })
            ->when(($this->group_id=='8'),function($query){ // agar nazer bod faghat marakez rostaei
                $query->whereIn('id', [3,4]);
            })
            ->when(($this->group_id=='5'),function($query){ // agar behdasht mohit bod faghat marakez va shabake
                $query->whereIn('id', [1,2,3,4]);
            })
            ->get();
        }
        $this->reset(['point_id','center_id','type_id']);
    }
    public function updatedTypeId()
    {

        $this->centers = Region_centers::
        where('county_id', $this->county_id)
            ->when(($this->type_id=='5'),function($query){ // agar khane bood faghat markaz rostaei va ...
                $query->whereIn('type_id', [3,4]);
            })
            ->when(($this->type_id=='6'),function($query){ // agar paygah bood faghat shahri
                $query->whereIn('type_id', [2,4]);
            })
            ->when(($this->type_id=='1'),function($query){ //
                $query->whereIn('type_id', [1]);
            })
            ->when(($this->type_id=='2'),function($query){ //
                $query->whereIn('type_id', [2]);
            })
            ->when(($this->type_id=='3'),function($query){ //
                $query->whereIn('type_id', [3]);
            })
            ->when(($this->type_id=='4'),function($query){ //
                $query->whereIn('type_id', [4]);
            })
            ->get();
        $this->reset(['point_id','center_id']);

    }

    public function updatedCenterId()
    {
        $this->points = \App\Models\Region_points::
        where('center_id', $this->center_id)
        ->where('type_id', $this->type_id) // faghat nogati ke type onha ba noe entekhab shode yeki bashe

            ->get();
        $this->reset(['point_id']);
    }

    public function render()
    {
        return view('livewire.create-user');
    }

}
