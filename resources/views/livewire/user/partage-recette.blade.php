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
        <x-text-input type="text" wire:model="base" class="w-full" id="base" placeholder="Ex: Oeuf " />
        <x-input-error :messages="$errors->get('base')" />

        <x-input-label for="ingredient" :value="__('Les ingrédients supplementaires')" />
        <textarea name="" id="ingredient" wire:model="ingredient" cols="50" placeholder="Ex:2pc de sels, 1L de huille , etc..." rows="2" style="resize: none" class="rounded w-full border-gray-500"></textarea>
        <x-input-error :messages="$errors->get('ingredient')" />

        <x-input-label for="etape" :value="__('Donnez nous les marches à suivre ')" />
        <textarea name="" id="etape" wire:model="etape" cols="50" placeholder="Décrivez Chaque étape à suivre pour avoir le resultat" rows="2" style="resize: none" class="rounded w-full border-gray-500"></textarea>
        <x-input-error :messages="$errors->get('etape')" />
        
        <x-input-label for="img" :value="__('Donnez nous une image de cette recette ')" />
        <input type="file" name="" wire:model="photo" id="img" accept="image/*">
        <x-input-error :messages="$errors->get('photo')" />

        <br>
        @if($photo)
        <button class="border-b border-t border-left border-r p-2 rounded bg-gray-500 focus:bg-white hover:bg-gray-900 text-white w-50 ">
            Partager
        </button>
        @endif

    </form>
</div>
