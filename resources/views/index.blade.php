<x-app-layout>
    @section('hero')
        <div class="w-full h-screen py-32 text-center">
            <h1 class="text-2xl font-bold text-center text-gray-700 md:text-3xl lg:text-5xl">
                Welcome to <span class="text-indigo-700">science recipe</span>
            </h1>
            <p class="mt-1 text-lg text-gray-500">Best website to upgrade your knowledge</p>
            <a wire:navigate
                class="inline-block px-3 py-2 mt-5 text-lg text-gray-800 transition duration-150 ease-in-out border-b-2 border-gray-300 hover:text-gray-700 hover:border-indigo-700"
                href="{{ route('books.index') }}">Start
                Reading Book</a>
        </div>
    @endsection
    <main class="container p-6 mx-auto">
        @include('books.category', ['categories' => $categories])
        <div class="py-5">
            <h1 class="my-3 text-3xl font-semibold">New Arrival Books</h1>
            @include('books.bookpage', ['books' => $newBooks])
        </div>
        <h2 class="mt-10 mb-3 text-3xl font-semibold">Coming Soon Books</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-y-6 gap-x-14">
            @forelse ($comings as $coming)
                <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md group min-h-fit">
                    <!-- Image -->
                    <img class="object-cover w-full h-80" src="{{ $coming->image }}" alt="{{ $coming->name }}">
                </div>
            @empty
                <p class="text-center text-gray-500">Book empty</p>
            @endforelse
        </div>
    </main>
</x-app-layout>