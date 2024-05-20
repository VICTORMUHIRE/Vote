
@extends('admin.superviseur.index')

@section('title', $superviseur -> exists ? 'Editer un superviseur':'Créer un superviseur')

@section('add')
    <div class="visible">
        <div class= "client-child">
            <div id="flex">
                <h4 class="font-weight-bold">@yield('title')</h4>
                <a href="{{route('admin.superviseur.index')}}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.03 8.97015C9.88786 8.83767 9.69981 8.76555 9.50551 8.76898C9.31121 8.77241 9.12582 8.85112 8.98841 8.98853C8.851 9.12595 8.77228 9.31133 8.76886 9.50563C8.76543 9.69993 8.83755 9.88798 8.97003 10.0302L10.94 12.0002L8.97003 13.9702C8.89635 14.0388 8.83724 14.1216 8.79625 14.2136C8.75526 14.3056 8.73322 14.4049 8.73144 14.5056C8.72966 14.6063 8.74819 14.7064 8.78591 14.7998C8.82363 14.8931 8.87978 14.978 8.95099 15.0492C9.02221 15.1204 9.10705 15.1766 9.20043 15.2143C9.29382 15.252 9.39385 15.2705 9.49455 15.2687C9.59526 15.267 9.69457 15.2449 9.78657 15.2039C9.87857 15.1629 9.96137 15.1038 10.03 15.0302L12 13.0602L13.97 15.0302C14.1122 15.1626 14.3003 15.2348 14.4946 15.2313C14.6889 15.2279 14.8742 15.1492 15.0117 15.0118C15.1491 14.8744 15.2278 14.689 15.2312 14.4947C15.2346 14.3004 15.1625 14.1123 15.03 13.9702L13.06 12.0002L15.03 10.0302C15.1037 9.96149 15.1628 9.87869 15.2038 9.78669C15.2448 9.69469 15.2668 9.59538 15.2686 9.49468C15.2704 9.39397 15.2519 9.29394 15.2142 9.20056C15.1764 9.10717 15.1203 9.02233 15.0491 8.95112C14.9779 8.8799 14.893 8.82375 14.7996 8.78603C14.7062 8.74831 14.6062 8.72979 14.5055 8.73156C14.4048 8.73334 14.3055 8.75538 14.2135 8.79637C14.1215 8.83736 14.0387 8.89647 13.97 8.97015L12 10.9402L10.03 8.97015Z" fill="#111111"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.063 1.25 1.25 6.063 1.25 12C1.25 17.937 6.063 22.75 12 22.75C17.937 22.75 22.75 17.937 22.75 12C22.75 6.063 17.937 1.25 12 1.25ZM2.75 12C2.75 9.54675 3.72455 7.19397 5.45926 5.45926C7.19397 3.72455 9.54675 2.75 12 2.75C14.4533 2.75 16.806 3.72455 18.5407 5.45926C20.2754 7.19397 21.25 9.54675 21.25 12C21.25 14.4533 20.2754 16.806 18.5407 18.5407C16.806 20.2754 14.4533 21.25 12 21.25C9.54675 21.25 7.19397 20.2754 5.45926 18.5407C3.72455 16.806 2.75 14.4533 2.75 12Z" fill="#111111"/>
                    </svg>
                </a>

            </div>
            <form class="vstack gap-3" action="{{route($superviseur->exists ? 'admin.superviseur.update':'admin.superviseur.store', $superviseur)}}" method="POST">
                @csrf
                @method($superviseur->exists ? 'put':'post')                <

                @include('shared.input', ['name' =>'name', 'value' => $superviseur->name])
                @include('shared.input', ['name' =>'email', 'value' => $superviseur->alias])

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
                <button class="btn btn-primary">
                    @if ($superviseur->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>

            </form>
        </div>
    </div>
@endsection
