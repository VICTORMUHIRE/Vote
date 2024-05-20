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

            <div class="adminName"><span>John</span></div>
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
                    <h4>Tous les facultes</h4>
                    <a class="btn btn-primary d-flex align-items-center gap-2" href="{{route("admin.faculte.create")}}">
                        <svg class="addsvg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="24" height="24" fill="#0067FF"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="white" stroke-width="1.5"/>
                            <path d="M15 12H12M12 12H9M12 12V9M12 12V15" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <div @style("color:white")>Nouvelle faculte</div>
                    </a>
                </div>
                <table class="table">
                    <thead class="thead1">
                        <tr>
                            <th">Nom</th>
                            <th>Surnom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tbody1">
                        @foreach ($facultes as $fac)
                            <tr>
                                <td>{{$fac->name}}</td>
                                <td>{{$fac->alias}}</td>
                                <td>
                                    <div class="d-flex gap-2 w-100 justify-content-center">
                                        <a style="background-color: rgba(0,0,0,0);border: none;" href="{{route('admin.faculte.edit',$fac)}}" class="btn btn-primary">
                                            <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.492 0.852318C9.906 0.852318 10.242 1.18832 10.242 1.60232C10.242 2.01632 9.906 2.35232 9.492 2.35232H5.753C3.169 2.35232 1.5 4.12232 1.5 6.86132V15.1753C1.5 17.9143 3.169 19.6843 5.753 19.6843H14.577C17.161 19.6843 18.831 17.9143 18.831 15.1753V11.1473C18.831 10.7333 19.167 10.3973 19.581 10.3973C19.995 10.3973 20.331 10.7333 20.331 11.1473V15.1753C20.331 18.7693 18.018 21.1843 14.577 21.1843H5.753C2.312 21.1843 0 18.7693 0 15.1753V6.86132C0 3.26732 2.312 0.852318 5.753 0.852318H9.492ZM18.2016 1.73092L19.4186 2.94792C20.0116 3.53992 20.3376 4.32692 20.3366 5.16492C20.3366 6.00292 20.0106 6.78892 19.4186 7.37992L11.9096 14.8889C11.3586 15.4399 10.6246 15.7439 9.8446 15.7439H6.0986C5.8966 15.7439 5.7026 15.6619 5.5616 15.5169C5.4206 15.3729 5.3436 15.1779 5.3486 14.9749L5.4426 11.1959C5.4616 10.4439 5.7646 9.73692 6.2966 9.20392L13.7706 1.73092C14.9926 0.510918 16.9796 0.510918 18.2016 1.73092ZM13.155 4.46692L7.3576 10.2649C7.0986 10.5239 6.9516 10.8679 6.9426 11.2329L6.8676 14.2439H9.8446C10.2246 14.2439 10.5806 14.0969 10.8496 13.8279L16.682 7.99392L13.155 4.46692ZM14.8306 2.79192L14.215 3.40592L17.742 6.93392L18.3586 6.31892C18.6666 6.01092 18.8366 5.60092 18.8366 5.16492C18.8366 4.72792 18.6666 4.31692 18.3586 4.00892L17.1416 2.79192C16.5046 2.15692 15.4686 2.15692 14.8306 2.79192Z" fill="black"/>
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{route('admin.faculte.destroy', $fac)}}">
                                            @csrf
                                            @method('delete')
                                            <button style="background-color: rgba(0,0,0,0);border: none;">
                                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3846 6.72019C16.7976 6.75419 17.1056 7.11519 17.0726 7.52819C17.0666 7.59619 16.5246 14.3072 16.2126 17.1222C16.0186 18.8692 14.8646 19.9322 13.1226 19.9642C11.7896 19.9872 10.5036 20.0002 9.2466 20.0002C7.8916 20.0002 6.5706 19.9852 5.2636 19.9582C3.5916 19.9252 2.4346 18.8412 2.2456 17.1292C1.9306 14.2892 1.3916 7.59519 1.3866 7.52819C1.3526 7.11519 1.6606 6.75319 2.0736 6.72019C2.4806 6.70919 2.8486 6.99519 2.8816 7.40719C2.88479 7.45059 3.10514 10.1842 3.34526 12.8889L3.39349 13.4286C3.51443 14.773 3.63703 16.0648 3.7366 16.9642C3.8436 17.9372 4.3686 18.4392 5.2946 18.4582C7.7946 18.5112 10.3456 18.5142 13.0956 18.4642C14.0796 18.4452 14.6116 17.9532 14.7216 16.9572C15.0316 14.1632 15.5716 7.47519 15.5776 7.40719C15.6106 6.99519 15.9756 6.70719 16.3846 6.72019ZM11.3454 0.000488281C12.2634 0.000488281 13.0704 0.619488 13.3074 1.50649L13.5614 2.76749C13.6435 3.18086 14.0062 3.48275 14.4263 3.48938L17.708 3.48949C18.122 3.48949 18.458 3.82549 18.458 4.23949C18.458 4.65349 18.122 4.98949 17.708 4.98949L14.4556 4.98934C14.4505 4.98944 14.4455 4.98949 14.4404 4.98949L14.416 4.98849L4.04162 4.98937C4.03355 4.98945 4.02548 4.98949 4.0174 4.98949L4.002 4.98849L0.75 4.98949C0.336 4.98949 0 4.65349 0 4.23949C0 3.82549 0.336 3.48949 0.75 3.48949L4.031 3.48849L4.13202 3.48209C4.50831 3.43327 4.82104 3.14749 4.8974 2.76749L5.1404 1.55149C5.3874 0.619488 6.1944 0.000488281 7.1124 0.000488281H11.3454ZM11.3454 1.50049H7.1124C6.8724 1.50049 6.6614 1.66149 6.6004 1.89249L6.3674 3.06249C6.33779 3.21068 6.29467 3.3535 6.23948 3.48976H12.2186C12.1634 3.3535 12.1201 3.21068 12.0904 3.06249L11.8474 1.84649C11.7964 1.66149 11.5854 1.50049 11.3454 1.50049Z" fill="black"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$facultes->links()}}
            </div>
        </div>
    </div>
    @yield('add')
</body>
</html>
