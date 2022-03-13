
<div class="form-group">
    <div class="custom-control custom-radio">
        <input class="custom-control-input" type="radio" name="{{ $name }}" id="{{$id}}" value="{{ old($name, $value ?? null) }}" >
        <label for="{{$id}}" class="custom-control-label">{{ __($label) }}</label>
    </div>
   </div>
@error($name)
<p class="text-danger">{{ $message }}</p>
@enderror
