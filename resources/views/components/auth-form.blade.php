<form action="{{ $route }}" method="POST" class="mt-24">
    @csrf
    {{ $slot }}
    <x-button type="submit" class="mt-24 text-center w-full">{{ $button }}</x-button>
</form>
