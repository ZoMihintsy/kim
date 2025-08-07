<?php

namespace App\Livewire\User;

use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\PartageRecette;
use Livewire\Component;

class Recette extends Component
{
    public $recette;
    public $coms;
    public $categorie;
    public $cat;
    public function mount()
    {
        $this->coms = Commentaire::get();
        $this->recette = PartageRecette::orderBy('updated_at','desc')->get();
        $this->categorie = Categorie::get();

    }
    public function liste()
    {
        if(!empty($this->cat))
        {
            $this->recette = PartageRecette::orderBy('updated_at','desc')->where('base',$this->cat)->get();
        }else{
            $this->recette = PartageRecette::orderBy('updated_at','desc')->get();

        }
    }
    public function render()
    {
        return view('livewire.user.recette');
    }
}
