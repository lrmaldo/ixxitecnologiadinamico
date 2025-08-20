<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public ?User $user = null;

    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = 'editor';
    public bool $is_active = true;

    public function mount(?int $id = null): void
    {
        abort_unless(auth()->user()?->isAdmin(), 403);
        if ($id) {
            $this->user = User::findOrFail($id);
            $this->fill($this->user->only(['name','email','role','is_active']));
        }
    }

    public function save(): void
    {
        $rules = [
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email'.($this->user?','.$this->user->id:'')],
            'role' => ['required','in:admin,editor,viewer'],
            'is_active' => ['boolean'],
        ];

        if (!$this->user) {
            $rules['password'] = ['required', PasswordRule::defaults(), 'confirmed'];
        } elseif ($this->password) {
            $rules['password'] = ['sometimes', PasswordRule::defaults(), 'confirmed'];
        }

        $data = $this->validate($rules);

        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        if ($this->user) {
            $this->user->update($data);
            session()->flash('status', 'Usuario actualizado.');
        } else {
            $this->user = User::create($data);
            session()->flash('status', 'Usuario creado.');
        }

        $this->redirectRoute('admin.users');
    }

    public function render()
    {
        $title = $this->user ? 'Editar usuario' : 'Nuevo usuario';
        return view('livewire.admin.users.edit')
            ->layout('components.layouts.app', ['title' => $title]);
    }
}
