<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class ToastNotification extends Component
{
    protected $listeners = [
        'showToast' => 'showToast'
    ];

    public function showToast($params)
    {
        $this->dispatch('toast-message', [
            'type' => $params['type'],
            'message' => $params['message']
        ]);
    }

    public function render()
    {
        return view('livewire.layout.toast-notification');
    }
}
