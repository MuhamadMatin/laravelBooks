<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class BookList extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';
    #[Url()]
    public $category = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    #[On('category')]
    public function updateCategory($category)
    {
        $this->category = $category;
        $this->resetPage();
    }

    public function resetAll()
    {
        $this->search = '';
        $this->category = '';
        $this->resetPage();
        $this->dispatch('resetAll');
    }

    #[Computed()]
    public function books()
    {
        return Book::with('category')
            ->where('name', 'like', '%' . $this->search . '%')
            ->when($this->category, function ($query) {
                return $query->where('category_id', $this->category);
            })
            ->paginate(20);
    }

    public function render()
    {
        return view('livewire.book-list');
    }
}
