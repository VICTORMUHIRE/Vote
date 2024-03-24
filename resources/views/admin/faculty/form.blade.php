
@extends('admin.faculty.index')

@section('title', $faculte -> exists ? 'Editer une faculté':'Créer une faculté')

@section('add')
    <div class="visible">
        <div class= "client-child">
            <h4 class="font-weight-bold">@yield('title')</h4>
            <form class="vstack gap-3" action="{{route($faculte->exists ? 'admin.faculte.update':'admin.faculte.store', $faculte)}}" method="POST">
                @csrf
                @method($faculte->exists ? 'put':'post')

                @include('shared.input', ['name' =>'name', 'value' => $faculte->name])
                @include('shared.input', ['name' =>'alias', 'value' => $faculte->alias])

                <div>
                    <button class="btn btn-primary">
                        @if ($faculte->exists)
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
