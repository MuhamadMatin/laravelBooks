<x-app-layout>
    <div class="container p-6 mx-auto">
        <x-breadcrumb :book="$book" :chapter="$chapter" />
        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="p-5">
                <h2 class="text-2xl font-bold">{{ $book->name }}</h2>
                <h3 class="mt-4 text-xl">{{ $chapter->name }}</h3>
            </div>
        </div>

        <!-- Pages -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold">Pages</h2>

            <div class="mt-4">
                <ul class="list-disc list-inside">
                    @forelse ($chapter->pages as $page)
                        <li>
                            <a wire:navigate
                                href="{{ route('page.show', [
                                    'book' => $book->slug,
                                    'chapter' => $chapter->slug,
                                    'page' => $page->slug,
                                ]) }}">
                                {{ $page->name }}
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-500">No pages available in this chapter.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
