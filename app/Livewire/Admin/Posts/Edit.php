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
    public bool $autoSaving = false;
    public bool $autoSaved = false;

    protected $listeners = [
        'trix-updated' => 'contentUpdated'
    ];

    protected function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'featured_file' => 'nullable|image|max:6144',
            'type' => 'required|in:articulo,infografia,caso_exito',
            'is_published' => 'boolean',
            'seo_title' => 'nullable|string|max:70',
            'seo_description' => 'nullable|string|max:170',
        ];
    }

    public function updated($name): void
    {
        if(in_array($name, ['title','excerpt','content','seo_title','seo_description'], true)) {
            $this->triggerAutosave();
        }
    }

    public function contentUpdated($html): void
    {
        $this->content = $html;
        $this->triggerAutosave();
    }

    protected function triggerAutosave(): void
    {
        $this->autoSaved = false;
        // Debounce manual vía dispatchBrowserEvent y setTimeout JS no requerido; Livewire agrupa.
        // Programar guardado diferido mediante queue microtask (simplificado).
        $this->dispatch('init-autosave');
    }

    public function autosave(): void
    {
        if ($this->autoSaving) return;
        $this->autoSaving = true;
        $data = $this->validate();
        if ($this->featured_file) {
            $stored = $this->featured_file->store('blog', 'public');
            $data['featured_image'] = $stored;
        }
        $data['is_published'] = (bool)($data['is_published'] ?? false);
        if ($this->post) {
            $this->post->update($data);
        } else {
            $this->post = Post::create($data);
        }
        $this->autoSaving = false;
        $this->autoSaved = true;
        $this->dispatch('notify', type: 'success', message: 'Guardado automático');
    }

    public function mount(?int $id = null): void
    {
        if ($id) {
            $this->post = Post::findOrFail($id);
            $this->fill($this->post->only(['title','excerpt','content','featured_image','type','is_published','seo_title','seo_description']));
        }
    }

    public function save(): void
    {
    $data = $this->validate();
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
        return view('livewire.admin.posts.edit', [
            'seoTitleLen' => mb_strlen($this->seo_title ?? ''),
            'seoDescLen' => mb_strlen($this->seo_description ?? ''),
        ])->layout('components.layouts.app', ['title' => $title]);
    }
}
