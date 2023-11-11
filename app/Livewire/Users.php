<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    #[Url(history:true)]
    public $search='';
    #[Url(history:true)]
    public $admin='';
    #[Url(history:true)]
    public $sortBy='created_at';
    #[Url(history:true)]
    public $sortDir='DESC';
    #[Url()]
    public $perPage = 5;
    public function updatedSearch(){
        $this->resetPage();
    }
    public function delete(User $user){
        $user->delete();
    }
    public function setSortBy($sortByField){
        if($this->sortBy===$sortByField){ // agar haman field sort shode bod hala bar ax sort kon
            $this->sortDir=($this->sortDir=="ASC") ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy=$sortByField;
        $this->sortDir='DESC'; // pishfarz desc sort kon
    }
    public function render()
    {
        $users=User::search($this->search)
            ->when($this->admin !=='',function ($query){
                $query->where('is_admin',$this->admin);
            })
            ->orderBy($this->sortBy,$this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.users',['users'=>$users]);
    }
}
