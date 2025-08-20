<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    public string $slug;

    public function mount(string $slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $post = Post::where('slug', $this->slug)->firstOrFail();

        return view('livewire.blog.show', compact('post'))
            ->layout('components.layouts.public', [
                'title' => $post->seo_title ?: $post->title,
                'metaDescription' => $post->seo_description,
                'metaImage' => $post->featured_image ? asset('storage/'.$post->featured_image) : null,
            ])
            ->title($post->seo_title ?: $post->title);
    }
}
