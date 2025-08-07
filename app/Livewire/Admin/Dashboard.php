<?php

namespace App\Livewire\Admin;

use App\Models\PartageRecette;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $recette;
    public $user;
    public function mount()
    {
        $this->recette = PartageRecette::count();
        $this->user = User::where('type','user')->count();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
