<x-layout page="dashboard">
    <h1 class="sr-only">Dashboard</h1>
    <x-nav/>
    <section class="grid grid-cols-3 gap-x-40 gap-y-64 px-40 mt-64">
        <h2 class="sr-only">Collections</h2>
        @isset($collections)
            @foreach($collections as $collections)
                <x-collection-card :$collection />
            @endforeach
        @endisset
        <x-collection-card />
    </section>

    <x-draft-collection-form />
</x-layout>
