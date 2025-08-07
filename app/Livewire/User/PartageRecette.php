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
    public $ingredients = [''];
    public $etape = "";
    public $photo;
    public function saveRecette()
    {
        $this->validate([
            'nom'=>['required'],
            'base'=>['required'],
            'ingredients.*'=>['required'],
            'etape'=>['required'],
            'photo'=>['required','image']
        ]);
        $this->photo->store('public');
        $photo = $this->photo->store();
        $recette = ModelsPartageRecette::create([
                'nom'=>$this->nom,
                'base'=>$this->base,
                'etape'=>nl2br($this->etape),
                'photo'=>$photo,
                'user_id'=>Auth::user()->id
            ]);
            foreach ($this->ingredients as $ingredientName) {
                $recette->ingredients()->create([
                    'name' => $ingredientName,
                ]);
            }
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
    public function addIngredientField()
    {
        $this->ingredients[] = ''; // Ajoute une nouvelle chaîne vide au tableau
    }

    public function removeIngredientField($index)
    {
        unset($this->ingredients[$index]); // Supprime l'ingrédient à l'index donné
        $this->ingredients = array_values($this->ingredients); // Ré-indexe le tableau pour éviter les problèmes
    }
    public function render()
    {
        return view('livewire.user.partage-recette');
    }
}
