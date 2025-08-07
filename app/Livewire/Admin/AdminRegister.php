<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Providers\RouteServiceProvider as ProvidersRouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules;


class AdminRegister extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()->mixedCase()->letters()->numbers()->symbols()],

        ]);
        
        $validated['type'] = "admin";
        $validated['password'] = Hash::make($validated['password']);
            $user = User::where('type','admin')->count();
            if($user >= 2)
            {
                session()->flash('status','Erreur');
            }else{
        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(ProvidersRouteServiceProvider::HOME, navigate: true); 
            }
        
    }
    public function render()
    {
        return view('livewire.admin.admin-register');
    }
}
