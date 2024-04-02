<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <title>@yield('title') | Administration</title>
</head>
<body class="body">
    <div class="header">
        <div class="logo d-flex align-items-center justify-center">
            <div class="logoImg">
                <img src="/static/logo.png" alt="">
            </div>
            <p>Admin</p>
        </div>
        <div class="adminInfo">
            <div class="notifification">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="path" d="M12 6.44V9.77" stroke="#757575" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                    <path class="path" d="M12.0199 2C8.3399 2 5.3599 4.98 5.3599 8.66V10.76C5.3599 11.44 5.0799 12.46 4.7299 13.04L3.4599 15.16C2.6799 16.47 3.2199 17.93 4.6599 18.41C9.4399 20 14.6099 20 19.3899 18.41C20.7399 17.96 21.3199 16.38 20.5899 15.16L19.3199 13.04C18.9699 12.46 18.6899 11.43 18.6899 10.76V8.66C18.6799 5 15.6799 2 12.0199 2Z" stroke="#757575" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                    <path class="path" d="M15.3299 18.82C15.3299 20.65 13.8299 22.15 11.9999 22.15C11.0899 22.15 10.2499 21.77 9.64992 21.17C9.04992 20.57 8.66992 19.73 8.66992 18.82" stroke="#757575" stroke-width="1.5" stroke-miterlimit="10"/>
                </svg>
            </div>

            <div class="adminName"><span>{{Auth::user()->name}}</span></div>
            <div class="adminImage">
                <img src="/static/admin.png" alt="">
            </div>
            <div class="drop">
                <svg width="24" height="24"         viewBox="0 0 24 24" fill="none"     xmlns="http://www.w3.org/2000/svg">
                    <path class="path" d="M19.9201 8.95001L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.95001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </div>
        </div>
    </div>
    <div class="bodyContainer">
        @include('shared.menu')

        <div class="container1">
            <div class="containter-child">
                @if (session('success'))
                    <div class="alert alert-success text-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="add d-flex justify-content-between align-items-center mt-2">
                    <h4>Tous les superviseurs</h4>
                    <a class="btn btn-primary d-flex align-items-center gap-2" href="{{route("admin.superviseur.create")}}">
                        <svg class="addsvg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="#0067FF"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="white" stroke-width="1.5"/>
                            <path d="M15 12H12M12 12H9M12 12V9M12 12V15" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <div @style("color:white")>Nouveau superviseur</div>
                    </a>
                </div>
                <table class="table1">
                    <thead class="thead1">
                        <tr>
                            <th class="d-flex justify-content-start">Nom</th>
                            <th>Matricule</th>
                            <th>email</th>
                            <th>Faculte</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tbody1">
                        @foreach ($superviseurs as $sup)
                            <tr>
                                <td class="d-flex justify-content-start"  >{{$sup->name}}</td>
                                <td>{{$sup->alias}}</td>
                                <td>{{$sup->faculte->alias}}</td>
                                <td>
                                    <div class="d-flex gap-2 w-100 justify-content-end">
                                        <a onclick="popUP()" href="{{route('admin.superviseur.edit',$sup)}}" class="btn btn-primary">Editer</a>
                                        <form method="POST" action="{{route('admin.superviseur.destroy', $sup)}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$superviseurs->links()}}
            </div>
        </div>
    </div>
    @yield('add')
</body>
</html>
