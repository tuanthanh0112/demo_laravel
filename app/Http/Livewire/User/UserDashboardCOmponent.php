<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboardCOmponent extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboard-c-omponent')->layout('layouts.base');
    }
}
