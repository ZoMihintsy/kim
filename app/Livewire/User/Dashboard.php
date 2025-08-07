<?php

namespace App\Livewire\User;

use App\Models\Jaime;
use App\Models\PartageRecette;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $mrecette;
    public $jaime;
    public $recette;
    public function mount()
    {
        $this->mrecette = PartageRecette::where('user_id',Auth::user()->id)->count();
        $this->recette = PartageRecette::count();
        $this->jaime = Jaime::where('user_id',Auth::user()->id)->count();
    }
    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
