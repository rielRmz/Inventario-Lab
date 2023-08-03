<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::select('users.*')
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->orwhere('email', 'LIKE', '%' . $this->search . '%')
            ->orderby('created_at', 'asc')
            ->paginate(10);

        return view('livewire.admin.users-index', compact('users'));
    }

    public function delete(User $user)
    {
        $data = User::find($user->id);
        $this->No_Serie = $data->id;
    }

    public function destroy()
    {
        User::find($this->No_Serie)->delete();
        $this->emit('UsuarioDelete');
    }
}