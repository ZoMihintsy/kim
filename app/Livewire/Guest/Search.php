<?php

namespace App\Livewire\Guest;

use App\Models\Commentaire;
use App\Models\PartageRecette;
use Livewire\Component;

class Search extends Component
{
    public $recherche;
    public $recette;
    public $coms;
    public function mount()
    {
        $this->coms = Commentaire::get();
        $this->recette = PartageRecette::get();
    }
    public function render()
    {
        return view('livewire.guest.search');
    }
}
