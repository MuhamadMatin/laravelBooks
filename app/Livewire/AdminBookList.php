<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class AdminBookList extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->resetPage();
        $this->dispatch('search-reset');
    }

    #[Computed()]
    public function books()
    {
        $query = Book::query();

        if (auth()->user()->hasRole('admin|Admin')) {
            $query->orderBy('id', 'DESC');
        }

        if (auth()->user()->hasRole('editor|Editor')) {
            $user_id = auth()->user()->id;
            $query->where('user_id', $user_id)
                ->orderBy('id', 'DESC');
        }

        if (auth()->user()->hasRole('user|User')) {
            $this->redirect('/');
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        return $query->paginate(15);
    }

    public function render()
    {
        return view('livewire.admin-book-list', [
            'books' => $this->books(),
        ]);
    }
}
