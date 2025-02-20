<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Table extends Component
{
    public $search = '';
    public $perPage = 5;
    public $sort = 'asc';

    public function deleteConfirmation($id)
    {
        $this->dispatch('showAlert', [
            'id' => $id
        ]);
    }

    #[On('delete-confirmed')]
    public function deleteConfirmed($id)
    {
        User::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.user.table', [
            'users' => User::search($this->search)->orderBy('created_at', $this->sort)->paginate($this->perPage)
        ]);
    }
}
