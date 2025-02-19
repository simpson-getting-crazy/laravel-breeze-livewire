<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.post.table', [
            'posts' => Post::select('id', 'title', 'slug', 'content', 'created_by')->paginate(5),
        ]);
    }
}
