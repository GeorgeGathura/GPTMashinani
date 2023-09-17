<?php

namespace App\Http\Livewire\Filters;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Accounts extends Component
{
    use WithPagination;
    public $search;
    public $selectedProfile;


    public function mount(){
        $this->selectedProfile = Auth::id();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showConversation($profileId)
    {
        $this->selectedProfile = $profileId;
    }

    public function render()
    {
        return view('livewire.filters.accounts',[
            'people'=>User::where('name','like','%'.$this->search.'%')
            ->orwhere('email','like','%'.$this->search.'%')
            ->orwhere('phone','like','%'.$this->search.'%')
            ->paginate(12),
            'trail'=>Conversation::where('user_id',$this->selectedProfile)->get()
        ]);
    }
}
