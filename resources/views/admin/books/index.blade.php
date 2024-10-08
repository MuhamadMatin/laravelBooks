<x-app-layout>
    <main class="container p-6 mx-auto">
        <span class="flex gap-x-5">
            <a wire:navigate href="{{ route('admin.index') }}"
                class="px-4 py-3 font-bold text-yellow-500 border-2 rounded-full">
                Back
            </a>
            @can('create_book')
                <a wire:navigate href="{{ route('admin.books.create') }}"
                    class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">Add
                    new book</a>
            @endcan
        </span>
        <livewire:admin-book-list />
    </main>
</x-app-layout>
