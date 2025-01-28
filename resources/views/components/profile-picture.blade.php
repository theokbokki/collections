<div class="w-32 h-32 rounded-full overflow-hidden">
    @if(auth()->user()->getAvatar())
    <img src="{{ auth()->user()->getAvatar()}}"
        alt="avatar"
        class="w-full h-full rounded-full"
    />
    @else
        {!! auth()->user()->default_avatar !!}
    @endif
</div>
