
@extends('admin.promotion.index')

@section('title', $promotion -> exists ? 'Editer une promotion':'Créer une promotion')

@section('add')
    <div class="visible">
        <div class= "client-child">
            <h4 class="font-weight-bold">@yield('title')</h4>
            <form class="vstack gap-3" action="{{route($promotion->exists ? 'admin.promotion.update':'admin.promotion.store', $promotion)}}" method="POST">
                @csrf
                @method($promotion->exists ? 'put':'post')

                <div @class(['form-group inputs'])>
                    <label for="faculte">Faculte</label>

                    <select class="form-control" name="faculte_id" id="faculte">
                        @foreach ($facultes as $facult)
                            <option value="{{$facult->id}}">{{$facult->alias}}</option>
                        @endforeach
                    </select>
                    @error("faculte_id")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>


                @include('shared.input', ['name' =>'name', 'value' => $promotion->name])
                @include('shared.input', ['name' =>'alias', 'value' => $promotion->alias])

                <div>
                    <button class="btn btn-primary">
                        @if ($promotion->exists)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
