<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class DeleteConfirmation extends Component
{
    protected $listeners = [
        'showAlert' => 'showAlert'
    ];

    public function showAlert($params)
    {
        $this->dispatch('alert-confirmation', [
            'id' => $params['id']
        ]);
    }

    public function render()
    {
        return view('livewire.layout.delete-confirmation');
    }
}
