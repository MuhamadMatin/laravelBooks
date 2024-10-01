<x-app-layout>
    <main class="container p-6 mx-auto">
        <h1 class="my-3 text-3xl font-semibold">Let's Start Reading Amazing World</h1>
        @include('books.category', ['categories' => $categories])
        <livewire:booklist />
    </main>
</x-app-layout>
