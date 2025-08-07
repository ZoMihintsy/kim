<?php

namespace App\Livewire\User;

use App\Models\Commentaire;
use App\Models\Jaime;
use App\Models\PartageRecette;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MesRecette extends Component
{
    public $recette;
    public $_recette;
    public $jaime;
    public $user;
    public $userReact;
    public $com;
    public function mount()
    {
        $this->recette = PartageRecette::get()->where('user_id',Auth::user()->id);
        $this->jaime = Jaime::orderBy('updated_at','desc')->where('user_id',Auth::user()->id)->get();
        $this->_recette = PartageRecette::get();
        $this->user = User::get();
        $this->userReact = Jaime::get();
        $this->com = Commentaire::get();
    }
    public function render()
    {
        return view('livewire.user.mes-recette');
    }
}
