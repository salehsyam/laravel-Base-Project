@props([
             'id',
            'name',
            'label',
            'selected' => '',
            'options' =>[],
                   ])

<div {{ $attributes->merge(['class' => 'form-group']) }}>

        @if (isset($label))
            <label for="{{ $id ?? $name }}">{{__( $label) }}</label>
        @endif

            <select class="form-control @error($name) is-invalid @enderror"
                    name="{{ $name }}"
                    id="{{ $id ?? $name }}">

                <option value="">{{__('Select Item')}}</option>

                @foreach ($options as $key => $value)
                    <option value="{{$key}}" @if($key == old($name,$selected)) selected @endif>{{$value}}</option>
                 @endforeach
            </select>
        @error($name)
        <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>


