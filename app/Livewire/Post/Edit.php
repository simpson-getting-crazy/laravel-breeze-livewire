<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;

class Edit extends Component
{
    public $post = null;

    #[Rule(rule: 'required')]
    public $title = '';

    #[Rule(rule: 'required')]
    public $slug = '';

    #[Rule(rule: 'required')]
    public $content = '';

    public function mount($post)
    {
        // Initiate Post
        $this->post = $post;

        // Filling Form
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->content = $post->content;
    }

    public function updated($property)
    {
        if ($property == 'title') {
            $this->slug = Str::slug($this->title);
        }
    }

    public function updatePost()
    {
        // Validating Request
        $this->validate();

        // Updating Post
        $this->post->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ]);

        $this->dispatch('showToast', [
            'type' => 'success',
            'message' => 'Post updated successfully.'
        ]);

        $this->redirect(url: route('post.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.post.edit');
    }
}
