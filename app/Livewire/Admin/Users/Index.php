<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function mount()
    {
        abort_unless(auth()->user()?->isAdmin(), 403);
    }

    public function delete(int $id): void
    {
        abort_unless(auth()->user()?->isAdmin(), 403);
        if (auth()->id() === $id) return; // no permitir auto-eliminarse
        User::findOrFail($id)->delete();
        session()->flash('status', 'Usuario eliminado.');
    }

    public function render()
    {
        $users = User::latest()->paginate(10);
        return view('livewire.admin.users.index', compact('users'))
            ->layout('components.layouts.app', ['title' => 'Usuarios']);
    }
}
