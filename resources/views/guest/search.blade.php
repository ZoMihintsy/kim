<x-guest>
    <x-slot name="slot">
        <center>
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
        </center>
        @livewire('guest.search',['recherche'=>$q])
    </x-slot>
</x-guest>