<?php

namespace App\Livewire\User;

use App\Models\Categorie;
use App\Models\Ingredient;
use App\Models\PartageRecette as ModelsPartageRecette;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PartageRecette extends Component
{
    use WithFileUploads;
    public $nom = "";
    public $base = "";
    public $ingredients = [['name' => '', 'quantite' => '']];
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
                if (!empty($ingredientName['name'])) {
                    $ingredient = Ingredient::firstOrCreate(['name' => $ingredientName['name']]);
                    $recette->ingredients()->attach($ingredient->id, ['quantite' => $ingredientName['quantite']]);
                }
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
        session()->flash('status','Recette partagé.');
    }
    public function addIngredientField()
    {
        
        $this->ingredients[] = ['name' => '', 'quantite' => ''];
    }

    public function removeIngredientField($index)
    {
        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }
    public function render()
    {
        return view('livewire.user.partage-recette');
    }
}
