@php
    $class ??= null;
    $label ??= ucfirst($name);
    $type ??='text';
    $name ??= '';
    $value ??= '';
    $id ??= '';

@endphp
<div @class(['form-group inputs', $class])>
    <label for="{{$name}}">{{$label}}</label>
    @if ($type === "textarea")
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{$type}}" name="{{$name}}">{{old($name, $value)}}</textarea>
    @else
        <input class="form-control @error($name) is-invalid @enderror" id="{{$name}}" type="{{$type}}" name="{{$name}}" name="{{$name}}" value="{{old($name, $value)}}">
    @endif

    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
