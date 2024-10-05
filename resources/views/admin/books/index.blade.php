<x-app-layout>
    <main class="container p-6 mx-auto">
        @can('create_book')
            <a wire:navigate href="{{ route('admin.books.create') }}"
                class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">Add
                new book</a>
        @endcan
        <livewire:admin-book-list />
    </main>
</x-app-layout>
