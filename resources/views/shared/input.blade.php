@php
    $label ??= null;
    $type ??='text';
    $name ??= '';
    
@endphp
<div class="inputs">
    <label for="{{$name}}">{{$label }}</label>
    <input type="{{$type}}" name="{{$name}}">
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>        
    @enderror
    
</div>