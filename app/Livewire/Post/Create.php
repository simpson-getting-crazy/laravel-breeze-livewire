<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;

class Create extends Component
{
    #[Rule(rule: 'required')]
    public $title = '';

    #[Rule(rule: 'required')]
    public $slug = '';

    #[Rule(rule: 'required')]
    public $content = '';

    public function updated($property)
    {
        if ($property == 'title') {
            $this->slug = Str::slug($this->title);
        }
    }

    public function createPost()
    {
        // Validating Request
        $this->validate();

        // Creating Post
        Post::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'created_by' => Auth::user()->email
        ]);

        $this->dispatch('showToast', [
            'type' => 'success',
            'message' => 'Post created successfully.'
        ]);

        $this->redirect(url: route('post.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
