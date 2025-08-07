<?php

namespace App\Livewire\User;

use App\Models\Categorie;
use App\Models\PartageRecette as ModelsPartageRecette;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PartageRecette extends Component
{
    use WithFileUploads;
    public $nom = "";
    public $base = "";
    public $ingredient = "";
    public $etape = "";
    public $photo;
    public function saveRecette()
    {
        $this->validate([
            'nom'=>['required'],
            'base'=>['required'],
            'ingredient'=>['required'],
            'etape'=>['required'],
            'photo'=>['required','image']
        ]);
        $this->photo->store('public');
        $photo = $this->photo->store();
        ModelsPartageRecette::create([
                'nom'=>$this->nom,
                'base'=>$this->base,
                'ingredient'=>nl2br($this->ingredient),
                'etape'=>nl2br($this->etape),
                'photo'=>$photo,
                'user_id'=>Auth::user()->id
            ]);
        $cat = Categorie::where('nom',$this->base)->count();
        if($cat >= 1)
        {

        }else{
        Categorie::create([
            'nom'=>$this->base
        ]);
        }
        $this->reset();
    }
    public function render()
    {
        return view('livewire.user.partage-recette');
    }
}
