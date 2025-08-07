<nav x-data="{ open: @entangle('open') }" class="bg-white fixed w-full flex-col z-1 shadow">
    <div class="container mx-auto px-4 py-4 flex w-full justify-between items-center">

        <div class="flex-shrink-0">
            <a href="/" class="text-xl font-bold text-gray-800">
                <img src="{{asset('logo/logo.png')}}" style="width:1.5cm;height:1.5cm" class="rounded-full" alt="" srcset="">
            </a>
        </div>

        <div class="hidden sm:flex items-center space-x-8">
            
            @auth
                <x-nav-link :href="route('dashboard')" wire:navigate :active="request()->routeIs('dahsboard')" wire:navigate>
                {{ __('footer.home') }}
                </x-nav-link>
            @endauth
            
            @guest
            <x-nav-link :href="url('/')" wire:navigate>
                {{ __('footer.home') }}
            </x-nav-link>
            <x-nav-link  :href="route('recette.guest')" wire:navigate :active="request()->routeIs('recette.guest')">
            {{ __('footer.recipe') }}
            </x-nav-link>

                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('footer.Login') }}
                </x-nav-link>
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('footer.Sing_up') }}
                </x-nav-link>
            @endguest
        </div>

        <div class="sm:hidden">
            <button @click="open = ! open" class=" w-full text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="sm:hidden fixed top-0 left-0 w-64 h-full bg-white shadow-xl z-50 overflow-y-auto w-full transition ">

        <div class="p-6 flex flex-col space-y-4">
        <div class="sm:hidden">
            <button @click="open = ! open" class=" w-full text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

            @auth
                <x-responsive-nav-link :href="route('dashboard')" wire:navigate :active="request()->routeIs('dashboard')">
                {{ __('footer.home') }}
                </x-responsive-nav-link>
            @endauth
            
            @guest
            
                <x-responsive-nav-link :href="url('/')" wire:navigate>
                {{ __('footer.home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('recette.guest')" wire:navigate :active="request()->routeIs('recette.guest')">
                {{ __('footer.recipe') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('footer.Login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                {{ __('footer.Sing_up') }}
                </x-responsive-nav-link>
            @endguest
        </div>
    </div>

    <div x-show="open" @click="open = false" class="md:hidden fixed inset-0 bg-black opacity-50 z-40"></div>
</nav>