<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;

class CategoryList extends Component
{

    public $category = '';

    public function updatedCategory($category)
    {
        $this->dispatch('category', category: $this->category);
    }

    #[On('resetAll')]
    public function resetCategory()
    {
        $this->category = '';
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.category-list', [
            'categories' => $categories,
        ]);
    }
}
