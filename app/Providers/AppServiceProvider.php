<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Page;
use App\Models\User;
use App\Policies\BookPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ChapterPolicy;
use App\Policies\PagePolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Book::class, BookPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(Chapter::class, ChapterPolicy::class);
        Gate::policy(Page::class, PagePolicy::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Admin|admin')) {
                return null;
            }
        });
    }
}
