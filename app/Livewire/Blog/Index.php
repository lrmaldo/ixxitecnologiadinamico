<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $q = '';

    public function render()
    {
        $posts = Post::published()
            ->when($this->q, fn($q) => $q->where('title', 'like', "%{$this->q}%"))
            ->latest('published_at')->paginate(9);

        return view('livewire.blog.index', compact('posts'))
            ->layout('components.layouts.public')
            ->title('Blog | IXXI TECNOLOGÍA');
    }
}
