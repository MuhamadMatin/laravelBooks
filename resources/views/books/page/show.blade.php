<x-app-layout>
    <div class="container p-6 mx-auto">
        <x-breadcrumb :book="$book" :chapter="$chapter" :page="$page" />
        page: {{ $page->body }}
    </div>
</x-app-layout>
