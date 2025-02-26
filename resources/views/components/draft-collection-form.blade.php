<div id="draft-collection-form" class="hidden opacity-0 absolute inset-0 items-center justify-center transition-all duration-300 bg-stone-700/50">
    <article class="max-w-400 w-full p-24 bg-white border border-stone-200 shadow-lg shadow-stone-200 rounded-xl transform-(--card-rotate) transition-all duration-300 ease-out hover:transform-none hover:shadow-md hover:duration-800 sm:p-40 sm:max-w-460">
        <h3 class="text-xl text-stone-800 font-bold sm:text-2xl">Create new collection</h3>
        <form action="/test" method="POST" class="mt-24">
            @csrf
            <x-input-field id="name" name="name" type="text" label="Name"/>
            <x-input-field id="text" name="text" type="text" label="Description"/>
            <x-button type="submit" class="mt-24 text-center w-full">Create</x-button>
        </form>
    </article>
</div>
