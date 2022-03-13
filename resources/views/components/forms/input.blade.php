<div {{ $attributes->merge(['class' => 'form-group']) }}>
    @if (isset($label))
        <label for="{{ $id ?? $name }}">{{ __($label) }}</label>
    @endif
    <input type="{{ $type ?? 'text' }}"
           class="form-control @error($name) is-invalid @enderror"
           name="{{ $name }}"
           id="{{ $id ?? $name }}"
           placeholder="{{$placeholder??$name}}"
           value="{{ old($name, $value ?? null) }}"
    >
    @error($name)
    <p class="invalid-feedback">{{ $message }}</p>
    @enderror

</div>
