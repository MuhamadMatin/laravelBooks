<x-app-layout>
    <div class="container block mx-auto">
        <span class="px-6 pt-6">
            <x-breadcrumb :book="$book" :chapter="$chapter" :page="$page" />
        </span>
        <div class="max-w-2xl p-6 mx-auto tracking-widest">
            {{ $page->body }}
        </div>
    </div>
</x-app-layout>
