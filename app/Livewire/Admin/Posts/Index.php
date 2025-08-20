<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(int $id): void
    {
        Post::findOrFail($id)->delete();
    }

    public function render()
    {
        $posts = Post::latest()->paginate(10);
        return view('livewire.admin.posts.index', compact('posts'))
            ->layout('components.layouts.app', ['title' => 'Publicaciones']);
    }
}
