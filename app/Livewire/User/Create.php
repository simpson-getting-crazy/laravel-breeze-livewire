<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Create extends Component
{
    #[Rule(rule: 'required')]
    public $name = '';

    #[Rule(rule: 'required|email|unique:users,email')]
    public $email = '';

    #[Rule(rule: 'required|min:8')]
    public $password = '';

    #[Rule(rule: 'required|min:8|same:password')]
    public $confirm_password = '';

    public function createUser()
    {
        // Validation
        $this->validate();

        // Create User
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'email_verified_at' => now(),
        ]);

        $this->dispatch('showToast', [
            'type' => 'success',
            'message' => 'User created successfully.'
        ]);

        $this->redirect(url: route('user.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
