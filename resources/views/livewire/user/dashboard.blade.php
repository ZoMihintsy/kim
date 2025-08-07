<?php

use App\Livewire\User\Dashboard;

new Dashboard
?>
<div>
    <div class="flex gap-2">
        <div class="w-full h-100  justify-center overflow-auto  bg-indigo-50 p-4 hover:scale-110 transition rounded shadow">
            <h2 class="text-xl border-b text-center ">
                 {{__('dashboard.recipe')}}
            </h2>
            <div class="text-center ">
                <strong class="text-4xl">{{$recette}}</strong>
            </div>
            <div>
                {{ __('dashboard.moment')}}
            </div>
        </div>

        <div class="w-full h-100  justify-center overflow-auto  bg-black  text-white p-4 hover:scale-110 transition rounded shadow">
            <h2 class="text-xl border-b text-center ">
                {{__('dashboard.recipes')}}
            </h2>
            <div class="text-center ">
                <strong class="text-4xl">{{$mrecette}}</strong>
            </div>
            <div>
                {{ __('dashboard.moment')}}
            </div>
        </div>

        <div class="w-full h-100  justify-center overflow-auto p-4 hover:scale-110 transition rounded shadow">
            <h2 class="text-xl border-b text-center ">
            {{__('dashboard.recipe')}} {{ __('dashboard.like')}}
            </h2>
            <div class="text-center ">
                <strong class="text-4xl">{{$jaime}}</strong>
            </div>
            <div>
                {{ __('dashboard.moment')}}
            </div>
        </div>

    </div>
</div>
