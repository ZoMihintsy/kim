<?php

use App\Livewire\User\MesRecette;

new MesRecette
?>
<div>
    
        @if($recette->isEmpty())
            <h5 class="text-center text-red-600">
                Vous n'avez pas encore ajouter des recettes  
            </h5>
        @else
        <center>
            <div>
        @foreach($recette as $recettes)
            <div class="shadow rounded p-2 transition w-100 h-100 justify-center overflow-auto bg-white">
                <div class="bg-gray-500 p-4 ">
                    
                <x-dropdown>
                    <x-slot name="trigger">
                            <button>
                                {{$recettes->jaime}} j'aime
                            </button>
                    </x-slot>
                    <x-slot name="content">
                        <h2 class="text-center">Ceux qui ont aimés</h2>

                        @foreach($userReact as $react)
                        <div style="text-align: left">
                            @php
                                $utilisateurTrouve = false;
                            @endphp

                            @foreach($user as $users)
                                @if($users->id == $react->user_id && $react->pub_id == $recettes->id)
                                    {{ $users->name }}
                                    @php
                                        $utilisateurTrouve = true;
                                    @endphp
                                    @break 
                                @endif
                            @endforeach

                            @if(!$utilisateurTrouve && $react->pub_id == $recettes->id )
                                Invité
                            @endif
                            <br>
                        </div>
                        @endforeach

                    </x-slot>
                </x-dropdown>
                    <span x-data="" x-on:click.prevent="$dispatch('open-modal','modal_{{$recettes->id}}')" style="cursor:pointer" class="border-lg border-b p-2 text-white">
                        {{$recettes->coms}} commentaire
                    </span>
                    <x-modal name="modal_{{$recettes->id}}" :show="$errors->isNotEmpty()">
                    <div wire:poll.5000ms style="text-align:left" class="ml-2">    
                    <h2 class="text-center text-3xl text-blue-500 border-b">
                            Les commentaires sur le {{$recettes->nom}}
                            <br>
                            
                        </h2>
                        @foreach($com as $coms)
                        @php
                                $utilisateurTrouves = false;
                            @endphp

                            @foreach($user as $users)
                                @if($users->id == $coms->user_id && $coms->pub_id == $recettes->id)
                                    {{ $users->name }}
                                    <br>
                                    Commentaire : {!! $coms->coms !!}
                                    <br>
                                    @php
                                        $utilisateurTrouves = true;
                                    @endphp
                                    @break 
                                @endif
                            @endforeach

                            @if(!$utilisateurTrouves && $coms->pub_id == $recettes->id )
                                Invité
                                <br>
                                Commentaire : {!! $coms->coms !!}
                                    <br>
                            @endif
                        @endforeach
                    </div>
                    </x-modal>
                    <b class="border-b text-red-600 p-2">
                        <a href="{{route('delete.product',['id'=>$recettes->id])}}" onclick="if(confirm('Vous êtes sur ?')){}else return false">Supprimer</a>
                    </b>
                </div>
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
                             {{ $ingredient->name }} &RightArrow; quantité : {{ $ingredient->pivot->quantite }}
                        </li>
                    @endforeach
                </div>
                <div style="text-align: left">
                    <strong>Marche à suivre </strong>: <br>
                    {!! substr($recettes->etape,0,50)  !!}@if(strlen($recettes->etape) > 50)... @endif 
                </div>
            </div>
            &nbsp;
            &nbsp;
        @endforeach
        </div>
        </center>
        @endif
        <h3 class="border-t mt-4 border-b p-2 text-center text-4xl text-blue-500">
            Ce que j'ai aimé
        </h3>
        @if($jaime->isEmpty())
            <p>
                Il n'y a pas de recette que vous avez aimé jusque là.
            </p>
        @else
        
        <div class="flex gap-2">
            @foreach($jaime as $like)
            @foreach($_recette as $_recettes)
            @if($like->pub_id == $_recettes->id)
            <div class="shadow rounded p-2 transition w-100 h-100 justify-center overflow-auto bg-white">
                <h3 class="border-b text-center text-3xl text-blue-500 p-2">
                    {{$_recettes->nom}}
                </h3>
                <h4 class="text-left left-0">
                   <strong>Ingrédient de base :</strong> {{$_recettes->base}}
                </h4>
                <div class=" overflow-hidden">
                    <img src="{{asset('storage/'.$_recettes->photo)}}" style="width:10cm;height:10cm auto;cursor:pointer" class="rounded hover:scale-110 hover:w-50 transition" alt="" srcset="">
                </div>
                <div style="text-align: left" class="overflow-hidden w-50 h-50">
                    <strong>Ingrédient supplementaire </strong>: <br>
                    @foreach ($_recettes->ingredients as $ingredient)
                        <li>
                             {{ $ingredient->name }} quantité : {{ $ingredient->pivot->quantite }}
                        </li>
                    @endforeach
                </div>
                <div style="text-align: left">
                    <strong>Marche à suivre </strong>: <br>
                    {!! substr($_recettes->etape,0,50)  !!}@if(strlen($_recettes->etape) > 50)... @endif 
                </div>
            </div>
            &nbsp;
            &nbsp;
            @endif
            @endforeach
            @endforeach
        </div>
        @endif



</div>
