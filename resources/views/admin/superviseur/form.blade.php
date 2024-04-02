
@extends('admin.superviseur.index')

@section('title', $superviseur -> exists ? 'Editer un superviseur':'Créer un superviseur')

@section('add')
    <div class="visible">
        <div class= "client-child">
            <h4 class="font-weight-bold">@yield('title')</h4>
            <form class="vstack gap-3" action="{{route($superviseur->exists ? 'admin.superviseur.update':'admin.superviseur.store', $superviseur)}}" method="POST">
                @csrf
                @method($superviseur->exists ? 'put':'post')

                @include('shared.input', ['name' =>'name', 'value' => $superviseur->name])
                @include('shared.input', ['name' =>'matricule', 'value' => $superviseur->matricule])
                @include('shared.input', ['name' =>'email', 'value' => $superviseur->email])

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

                <div>
                    <button class="btn btn-primary">
                        @if ($superviseur->exists)
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
