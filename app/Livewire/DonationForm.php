<?php

namespace App\Livewire;

use Livewire\Component;

class DonationForm extends Component
{
    public $username;

    public function mount($username)
    {
        return $this->username = $username;
    }

    public function render()
    {
        return view('donation-form');
    }
}
