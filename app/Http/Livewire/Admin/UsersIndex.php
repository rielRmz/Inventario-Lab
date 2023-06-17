<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class   UsersIndex extends Component
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
        $users = DB::table('users')
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->orwhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.admin.users-index', compact('users'));
    }
}
