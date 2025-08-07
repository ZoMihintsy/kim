<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
          @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
<div class=" overflow-hidden">
<br>
<br>
<br>
<br> 
<h1 class=" text-3xl left-1 text-red-500">Kossa I Mange : <span class="border-b border-ring-1 text-blue-500 hover:scale-110">{{ __('texte.slogan') }}</span></h1>
    <div class="  text-center mt-4 flex flex-col items-center justify-center">
    <div class="container mx-auto px-4">
    <h1 class="text-4xl font-bold text-center">{{ __('home.welcome') }}</h1>
    <p class="text-center mt-4 text-lg text-gray-600">{{ __('texte.home_1') }}</p>
    </div>
        <p class="mt-4 max-w-2xl text-lg sm:text-xl text-red-900 ">
        {{ __('texte.home_2') }}
        </p>

        <div class="mt-10 w-full max-w-xl px-4">
            <form action="{{route('query')}}" method="get">
                
                <div class="">
                    <input id="query" name="q" type="text" 
                           class=" w-full py-4 pl-12 pr-4 text-base rounded-full placeholder-gray-500 text-gray-900 shadow-xl focus:ring-green-500 focus:border-green-500 border-gray-300"
                           placeholder="{{ __('texte.search') }}"
                           required>
                </div>
            </form>
        </div>
    </div>
</div>
<section class="py-2">
    <div class="rounded px-4">
            <div class=" rounded-xl shadow-lg overflow-hidden transition-transform transform  transition">
                <center>
                  <img class="hover:scale-110 transition" style="width:10cm;height:10cm" src="{{asset('logo/logo.png')}}" alt="KIM">  
                </center>
            </div>
    </div>
</section>
        </div>
    </body>
</html>
