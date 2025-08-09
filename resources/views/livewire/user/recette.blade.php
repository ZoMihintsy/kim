<?php

use App\Livewire\User\Recette;

new Recette
?>
<div>
<select name="" id="cat" wire:model="cat" wire:input="liste" class="rounded">
    <option value="">---Lister par ingrédient de base---</option>
    @foreach($categorie as $_categorie)
        <option value="{{$_categorie->nom}}">{{$_categorie->nom}}</option>
    @endforeach
</select>
<br>
<h2 class="text-center text-3xl font-semibold border-b">
    @if(!empty($cat))
    <q>
        {{$cat}}
    </q>
    @endif
</h2>
<br>
@if($recette->isEmpty())
            <h5 class="text-center text-blue-500">
                Il n'y a pas de recette pour l'instant  
            </h5>
        @else
        <center>
    <div >
        @foreach($recette as $recettes)
            <div class="shadow rounded p-2 transition w-100 h-100 justify-center overflow-auto bg-white">
            <h3 class="border-b text-center text-3xl text-blue-500 p-2">
                    {{$recettes->nom}}
                </h3>
                <h4 class="text-left left-0">
                   <strong>Ingrédient de base :</strong> {{$recettes->base}}
                </h4>
                <div class=" overflow-hidden">
                    <img src="{{asset('storage/'.$recettes->photo)}}" style="width:10cm;height:10cm auto;cursor:pointer" class="rounded hover:scale-110 hover:w-50 transition" alt="" srcset="">
                </div>
                <div style="text-align: left" class="overflow-hidden w-50 h-50">
                    <strong>Ingrédient supplementaire </strong>: <br>
                    
                    @foreach ($recettes->ingredients as $ingredient)
                        <li>
                             {{ $ingredient->name }} quantité : {{ $ingredient->pivot->quantite }}
                        </li>
                    @endforeach
                    
                </div>
                <div style="text-align: left">
                    <strong>Marche à suivre </strong>: <br>
                    {!! $recettes->etape !!}
                </div>
                @if($recettes->user_id == Auth::user()->id)

                @else
                <div class="bg-gray-500 p-2 rounded">
                <button 
                x-data=""
                 x-on:click.prevent="$dispatch('open-modal','modal_{{$recettes->id}}')" style="cursor:pointer" class="bg-white p-2 rounded">Commenter @if($recettes->coms <= 0) @else {{$recettes->coms}} @endif</button>
                <a href="{{route('recette.jaime',['id'=>$recettes->id])}}" class="bg-indigo-50 rounded p-2 border-b hover:scale-110 transition " wire:navigate> J'aime @if($recettes->jaime <= 0) @else {{$recettes->jaime}} @endif</a>
                <x-modal name="modal_{{$recettes->id}}" :show="$errors->isNotEmpty()">
                    <h2 class="text-center border-b ">
                        Commentaire sur la recette  {{$recettes->nom}}
                    </h2>
                <h4 class="text-left left-0">
                   <strong>Ingrédient de base :</strong> {{$recettes->base}}
                </h4>
                <div class=" overflow-hidden">
                    <img src="{{asset('storage/'.$recettes->photo)}}" style="width:10cm;height:10cm auto;cursor:pointer" class="rounded hover:scale-110 hover:w-50 transition" alt="" srcset="">
                </div>
                <div style="text-align: left" class="overflow-hidden w-50 h-50">
                    <strong>Ingrédient supplementaire </strong>: <br>
                    <ul>
                        @foreach ($recettes->ingredients as $ingredient)
                            <li>{{ $ingredient->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div style="text-align: left">
                    <strong>Marche à suivre </strong>: <br>
                    {!! $recettes->etape  !!} 
                </div>
                <div style="height:10cm;overflow-y:scroll;" class="border-t mt-4">
                   @foreach($coms as $com)
                        @if($com->pub_id == $recettes->id)
                        @if(empty($com->coms))
                            Vide 
                        @else
                            <div class="border-l " style="text-align: left">
                            @if($com->user_id == Auth::user()->id)
                            Moi :
                                {!! $com->coms !!}
                                <br>
                            @endif
                            </div>
                        @endif
                        @endif
                   @endforeach
                </div>
                <br>
                <div>
                    <form action="{{route('send.coms',['id'=>$recettes->id])}}" method="post">
                        @csrf
                        @method('put')
                    <textarea name="coms" required id="" cols="50" rows="2" placeholder="Entrer votre commentaire ..."></textarea>
                    <br>
                    <x-primary-button>
                        Envoyer
                    </x-primary-button>
                    </form>
                </div>
                </x-modal>
                </div>
                @endif
                
            </div>
        @endforeach
@endif
</div>
