<x-layout>
    <main class="w-full h-full flex flex-col justify-center items-center px-16 before:absolute before:inset-0 before:-z-1 before:bg-[linear-gradient(to_right,var(--color-stone-50)_1px,transparent_1px),linear-gradient(to_bottom,var(--color-stone-50)_1px,transparent_1px)] before:bg-[size:24px_24px] before:[mask-image:linear-gradient(to_top,#000,transparent)]">
        <a href="{{ route('home') }}" class="absolute top-32 left-40 flex items-center group">
            <x-icon/>
        </a>
        <div class="max-w-400 w-full p-24 bg-white border border-stone-200 shadow-lg shadow-stone-200 rounded-xl transform-(--card-rotate) transition-all duration-300 ease-out hover:transform-none hover:shadow-md hover:duration-800 sm:p-40 sm:max-w-460">
            <h1 class="text-xl text-stone-800 font-bold sm:text-2xl">{{ $title }}</h1>
            {{ $slot }}
        </div>
    </main>
</x-layout>
