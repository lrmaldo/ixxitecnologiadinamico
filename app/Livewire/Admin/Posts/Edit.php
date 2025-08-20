<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public ?Post $post = null;

    #[Validate('required|string|min:3')]
    public string $title = '';
    public ?string $excerpt = '';
    public ?string $content = '';
    public ?string $featured_image = '';
    #[Validate('nullable|image|max:6144')]
    public $featured_file = null;
    public string $type = 'articulo';
    public bool $is_published = false;
    public ?string $seo_title = '';
    public ?string $seo_description = '';

    public function mount(?int $id = null): void
    {
        if ($id) {
            $this->post = Post::findOrFail($id);
            $this->fill($this->post->only(['title','excerpt','content','featured_image','type','is_published','seo_title','seo_description']));
        }
    }

    public function save(): void
    {
        // Validar y capturar todos los campos relevantes, incluyendo "type"
        $data = $this->validate([
            'title' => 'required|string|min:3',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'featured_file' => 'nullable|image|max:6144',
            'type' => 'required|in:articulo,infografia,caso_exito',
            'is_published' => 'boolean',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);
        if ($this->featured_file) {
            $stored = $this->featured_file->store('blog', 'public');
            $data['featured_image'] = $stored;
        }
        // Normalizar checkbox por si no viene en el payload
        $data['is_published'] = (bool)($data['is_published'] ?? false);
        if ($this->post) {
            $this->post->update($data);
        } else {
            $this->post = Post::create($data);
        }
    session()->flash('status', 'Publicación guardada');
        $this->redirectRoute('admin.posts');
    }

    public function render()
    {
        $title = $this->post ? 'Editar publicación' : 'Nueva publicación';
        return view('livewire.admin.posts.edit')
            ->layout('components.layouts.app', ['title' => $title]);
    }
}
