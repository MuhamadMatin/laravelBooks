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
        return Book::orderBy('id', 'DESC')
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin-book-list');
    }
}
