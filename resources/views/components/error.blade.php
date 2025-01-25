@error($name)
    <p {!! $attributes->merge(['class' => 'text-red-500']) !!}>
        {{ $message }}
    </p>
@enderror
