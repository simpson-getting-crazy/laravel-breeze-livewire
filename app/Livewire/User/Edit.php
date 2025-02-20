<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Edit extends Component
{
    public $user = null;

    #[Rule(rule: 'required')]
    public $name = '';

    #[Rule(rule: "required|email")]
    public $email = '';

    #[Rule(rule: 'nullable|min:8')]
    public $password = '';

    #[Rule(rule: 'nullable|min:8|same:password')]
    public $confirm_password = '';

    public function mount($user)
    {
        $this->user = $user;

        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateUser()
    {
        // Validation
        $this->validate();

        // Create User
        $model = $this->user;
        $model->name = $this->name;
        $model->email = $this->email;

        if (!empty($this->password)) {
            $model->password = $this->password;
        }

        $this->dispatch('showToast', [
            'type' => 'success',
            'message' => 'User updated successfully.'
        ]);

        $this->redirect(url: route('user.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
