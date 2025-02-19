<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

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
        Post::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.post.table', [
            'posts' => Post::search($this->search)->orderBy('created_at', $this->sort)->paginate($this->perPage),
        ]);
    }
}
