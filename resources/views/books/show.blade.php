<x-app-layout>
    <div class="container p-6 mx-auto">
        <x-breadcrumb :book="$book" />
        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3">
                    <img class="object-cover w-full h-full" src="{{ $book->getImage() }}" alt="{{ $book->name }}">
                </div>
                <div class="p-5 md:w-2/3">
                    <span class="flex gap-x-4">
                        <h4 class="text-2xl font-semibold tracking-tight text-gray-900">{{ $book->name }}</h4>
                        <livewire:like-book :key="$book->id" :book="$book" />
                    </span>
                    <h5 class="mt-4 text-gray-800">{{ $book->User->name }}</h5>
                    <p class="mt-2 text-gray-700 whitespace-normal">{{ $book->desk }}</p>
                </div>
            </div>
        </div>

        <!-- Chapter dan Pages -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold">Chapters</h2>

            <div class="mt-4">
                @forelse ($book->chapters as $chapter)
                    <div class="mb-6">
                        <a wire:navigate
                            href="{{ route('chapter.show', [
                                'book' => $book->slug,
                                'chapter' => $chapter->slug,
                            ]) }}">
                            <h3 class="text-xl font-bold text-gray-900">{{ $chapter->name }}</h3>
                        </a>
                        <ul class="ml-4 list-disc list-inside">
                            @forelse ($chapter->pages as $page)
                                <a wire:navigate
                                    href="{{ route('page.show', [
                                        'book' => $book->slug,
                                        'chapter' => $chapter->slug,
                                        'page' => $page->slug,
                                    ]) }}">
                                    <li class="text-gray-700">{{ $page->name }}</li>
                                </a>
                            @empty
                                <li class="text-gray-500">No pages in this chapter.</li>
                            @endforelse
                        </ul>
                    </div>
                @empty
                    <p class="text-gray-500">No chapters available for this book.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
