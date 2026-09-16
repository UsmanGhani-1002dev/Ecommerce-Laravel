@props([
    'name',
    'type' => 'text',
    'value' => null,
])

<div>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        value="{{ $value ?? old($name) }}" 
        {{ $attributes->merge(['class' => 'w-full border p-3 rounded focus:outline-none focus:border-primary transition']) }}
    />

    @error($name)
        <p class="text-sm text-red-600 mt-1 font-semibold">{{ $message }}</p>
    @enderror
</div>
