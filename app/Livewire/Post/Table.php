<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Table extends Component
{
    public $search = '';
    public $perPage = 5;
    public $sort = 'asc';

    public function render()
    {
        return view('livewire.post.table', [
            'posts' => Post::search($this->search)->orderBy('created_at', $this->sort)->paginate($this->perPage),
        ]);
    }
}
