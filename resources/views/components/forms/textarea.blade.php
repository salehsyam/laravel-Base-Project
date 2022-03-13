<div {{ $attributes->merge(['class' => 'form-group']) }}>
    <label  class="form-label">{{ $label }} <span class="form-label-description"></span></label>
    <textarea  name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}">{{ old($name, $value ?? null) }}</textarea>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

