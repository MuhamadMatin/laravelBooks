<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class LikeBook extends Component
{
    #[Reactive]
    public Book $book;

    public function toggleLike()
    {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        if ($user->hasLiked($this->book)) {
            $user->LikedBooks()->detach($this->book);
            return;
        }

        $user->LikedBooks()->attach($this->book);
    }

    public function render()
    {
        return view('livewire.like-book');
    }
}
