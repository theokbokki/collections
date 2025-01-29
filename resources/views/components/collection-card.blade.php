<article class="w-full flex flex-col group hover:cursor-pointer">
    <h3 class="mt-16 text-stone-800">
    @isset($collection)
        {{ $collection->name }}
    @else
        Create new collection
    @endisset
    </h3>

    @isset($collection)
        <p>{{ $collection->description }}</p>
    @endisset

    <div class="-order-1 w-full h-260 bg-stone-50 border border-stone-200 flex justify-center items-center text-stone-400 rounded-lg transition-all duration-250 group-hover:border-stone-400 group-hover:text-stone-500">
    @isset($collection)
        <img src="{{ $collection->getImage() }}" alt="" class="w-full h-full object-cover">
    @else
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-64">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    @endisset
    </div>
</article>
