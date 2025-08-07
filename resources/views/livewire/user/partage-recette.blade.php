<?php

use App\Livewire\User\PartageRecette;

new PartageRecette
?>
<div>
<form wire:submit="saveRecette">
    <h1 class="border-b text-3xl text-blue-500 mb-4">
        Formulaire pour ajouter votre recette
    </h1>
    <x-input-label for="nom" :value="__('Nom du recette')" />
    <x-text-input type="text" wire:model="nom" class="w-full" id="nom" placeholder="Ex: sushi..." />
    <x-input-error :messages="$errors->get('nom')" />

    <x-input-label for="base" :value="__('Quel ingrédient est au coeur du plat ?')" />
    <x-text-input type="text" wire:model="base" class="w-full" id="base" placeholder="Ex: Oeuf" />
    <x-input-error :messages="$errors->get('base')" />

    <x-input-label for="ingredients" :value="__('Les ingrédients supplémentaires')" />
    <p class="text-sm text-gray-600 mb-2">Cliquez sur "Ajouter un ingrédient" pour ajouter plusieurs champs.</p>
    
    @foreach ($ingredients as $index => $ingredient)
        <div class="flex items-center mb-2" wire:key="ingredient-{{ $index }}">
            <x-text-input 
                type="text" 
                wire:model.lazy="ingredients.{{ $index }}" 
                class="w-full" 
                placeholder="Ex: Piment" 
            />
            <x-danger-button type="button" wire:click="removeIngredientField({{ $index }})" class="ml-2 px-3 py-2 bg-red-500 rounded-md hover:bg-red-600">
                &times;
            </x-danger-button>
        </div>
        <x-input-error :messages="$errors->get('ingredients.'.$index)" />
    @endforeach

    <button type="button" wire:click="addIngredientField" class="mt-2 px-4 py-2 bg-blue-500 rounded-md hover:bg-blue-600">
        Ajouter un ingrédient
    </button>
    <br>
    <x-input-label for="etape" :value="__('Donnez nous les marches à suivre')" />
    <textarea name="" id="etape" wire:model="etape" cols="50" placeholder="Décrivez Chaque étape à suivre pour avoir le resultat" rows="2" style="resize: none" class="rounded w-full border-gray-500"></textarea>
    <x-input-error :messages="$errors->get('etape')" />
    
    <x-input-label for="img" :value="__('Donnez nous une image de cette recette')" />
    <input type="file" name="" wire:model="photo" id="img" accept="image/*">
    <x-input-error :messages="$errors->get('photo')" />

    <br>
    @if($photo)
    <button type="submit" class="border-b border-t border-l border-r p-2 rounded bg-gray-500 focus:bg-white hover:bg-gray-900 text-white w-50">
        Partager
    </button>
    @endif
</form>
</div>
