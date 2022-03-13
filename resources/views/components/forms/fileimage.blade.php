<div class="row">
    <div class="col-md-6">
        <div {{ $attributes->merge(['class' => 'form-group']) }}>
            @if (isset($label))
                <label for="{{ $id ?? $name }}">{{ $label }}</label>
            @endif
            <div class="custom-file">
                <input type="{{ $type ?? 'file' }}"
                       class="form-control @error($name) is-invalid @enderror"
                       name="{{ $name }}"
                       id="customFileLang"
                       value="{{ old($name, $value ?? null) }}"
                       onchange="previewfile(this)"
                >
                <label class="custom-file-label" for="customFileLang">{{__('Choose a Image')}}</label>

                @error($name)
                <p class="invalid-feedback">{{ $message }}</p>
                <p class="invalid-feedback">image :jpeg,png,jpg,gif,svg|max:2048</p>
                @enderror

            </div>
        </div>

    </div>
    <div class="col-md-6">
        <img id="previewImg" alt="Profile Image" style="max-width: 90px;margin-top: 20px"/>
    </div>

</div>

  @if (isset($value) == $value)
          <div class="form-group">
          <img src="{{asset('uploads/article/'.$value)}}" style="width: 21%;height: 150px;" />
  </div>
 @endif
