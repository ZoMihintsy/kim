<?php

use App\Livewire\Guest\Search;

new Search;
?>
<div>
    <div>
        <h2 class="text-4xl text-center borber-b text-blue-500 p-2">
            Resultat de votre recherche <q>{{$recherche}}</q>
        </h2>
        @php
         $recherche = isset($recherche) ? $recherche : '';
        $keywords = preg_split('/[\s,]+/', $recherche, -1, PREG_SPLIT_NO_EMPTY);
    @endphp

    <div class="flex flex-wrap gap-4">
        @foreach($recette as $recettes)
            @php
                $ingredientsAsString = $recettes->ingredients->pluck('name')->implode(' ');
                $searchableText = $recettes->nom . ' ' . $recettes->base . ' ' . $ingredientsAsString;
                
                $allKeywordsFound = true;
                
                foreach ($keywords as $keyword) {
                    $pattern = '/' . preg_quote($keyword, '/') . '/i';
                    if (!preg_match($pattern, $searchableText)) {
                        $allKeywordsFound = false; 
                        break; 
                    }
                }
            @endphp
            
            @if($allKeywordsFound)
                <div class="shadow rounded p-4 w-full md:w-1/3 lg:w-1/4 transition bg-white">
                    <h3 class="border-b text-center text-3xl text-blue-500 p-2">
                        {!! preg_replace($pattern, '<span class="text-red-500 font-semibold underline">$0</span>', $recettes->nom) !!}
                    </h3>
                    <h4 class="text-left left-0">
                        <strong>Ingrédient de base :</strong>
                        {!! preg_replace($pattern, '<span class="text-red-500 font-semibold underline">$0</span>', $recettes->base) !!}
                    </h4>
                    <div class="overflow-hidden">
                        <center>
                            <img src="{{asset('storage/'.$recettes->photo)}}" style="width:10cm; height:10cm auto; cursor:pointer" class="rounded hover:scale-110 transition" alt="" srcset="">
                        </center>
                    </div>
                    <div style="text-align: left" class="overflow-hidden">
                        <strong>Ingrédients supplémentaires :</strong> <br>
                        
                            @foreach ($recettes->ingredients as $ingredient)
                            <li>
                                 {!! preg_replace($pattern, '<span class="text-red-500 underline">$0</span>', $ingredient->name)!!} &RightArrow;
                                quantité : {!! preg_replace($pattern, '<span class="text-red-500 underline">$0</span>', $ingredient->pivot->quantite) !!}
                            </li>
                            @endforeach
                        
                    </div>
                    <div style="text-align: left">
                        <strong>Marche à suivre :</strong> <br>
                        {!! preg_replace($pattern, '<span class="text-red-500 font-semibold underline">$0</span>', substr($recettes->etape, 0, 50)) !!}
                        @if(strlen($recettes->etape) > 50)... @endif
                    </div>
                    <div class="bg-gray-500 p-2 rounded flex justify-between mt-4">
                        <button 
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal','modal_{{$recettes->id}}')" 
                            style="cursor:pointer" 
                            class="bg-white p-2 rounded">
                            Commenter @if($recettes->coms > 0) {{ $recettes->coms }} @endif
                        </button>
                        <a href="{{route('recettes.jaime',['id'=>$recettes->id])}}" class="bg-indigo-50 rounded p-2 border-b hover:scale-110 transition" wire:navigate> 
                            J'aime @if($recettes->jaime > 0) {{ $recettes->jaime }} @endif
                        </a>
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
                            <div class="border-b border-t " style="text-align: left">
                            @if($com->user_id == request()->userAgent())
                            Moi :
                            {!! $com->coms !!}
                                <br>
                                <a href="" class="right-0 text-red-500 font-semiboldxt-align: right">Supprimer</a>
                            @else
                              {!! $com->coms !!}
                            @endif
                            </div>
                        @endif
                        @endif
                   @endforeach
                </div>
                <br>
                <div>
                    <form action="{{route('sends.coms',['id'=>$recettes->id])}}" method="post">
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
            </div>
                @endif
            @endforeach
    </div>
        </div>
    </div>
</div>
