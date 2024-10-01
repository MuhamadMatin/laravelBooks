<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

class BookList extends Component
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
        return Book::where('name', 'like', '%' . $this->search . '%')
            ->paginate(8);
    }

    public function render()
    {
        return view('livewire.book-list');
    }
}
