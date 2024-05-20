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

                <div class="add-election d-flex  mt-2 mb-4" style="min-width: 100%">
                    <form style="width: 30rem" class="date-form" action="{{route('admin.election.generate')}}" method="POST">
                        @csrf
                        @method('post')
                        <button style="width: 18rem" class="btn btn-primary" id="date_button">Générer elections</button>
                        <input style="" id="date_input" type="date" class="form-control"  name="openingDate" required>
                    </form>
                    <a href="{{route('admin.election.annoncer')}}" class="btn btn-primary">Annoncer scrutin</a>
                </div>
                <table class="table">
                    <thead class="thead1">
                        <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Etat</th>
                            <th>Date d'ouverture</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tbody1">
                        @foreach ($Elections as $election)
                            <tr>
                                <td>{{$election->name}}</td>
                                <td>{{$election->type}}</td>
                                <td>{{$election->etat}}</td>
                                <td>{{$election->date_ouverture}}</td>
                                <td>
                                    <div class="d-flex gap-2 w-100 justify-content-center">
                                        <form method="POST" action="{{route('admin.election.delete', $election)}}">
                                            @csrf
                                            @method('delete')
                                            <button style="background-color: rgba(0,0,0,0);border: none;">
                                                <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="action-path" fill-rule="evenodd" clip-rule="evenodd" d="M16.3846 6.72019C16.7976 6.75419 17.1056 7.11519 17.0726 7.52819C17.0666 7.59619 16.5246 14.3072 16.2126 17.1222C16.0186 18.8692 14.8646 19.9322 13.1226 19.9642C11.7896 19.9872 10.5036 20.0002 9.2466 20.0002C7.8916 20.0002 6.5706 19.9852 5.2636 19.9582C3.5916 19.9252 2.4346 18.8412 2.2456 17.1292C1.9306 14.2892 1.3916 7.59519 1.3866 7.52819C1.3526 7.11519 1.6606 6.75319 2.0736 6.72019C2.4806 6.70919 2.8486 6.99519 2.8816 7.40719C2.88479 7.45059 3.10514 10.1842 3.34526 12.8889L3.39349 13.4286C3.51443 14.773 3.63703 16.0648 3.7366 16.9642C3.8436 17.9372 4.3686 18.4392 5.2946 18.4582C7.7946 18.5112 10.3456 18.5142 13.0956 18.4642C14.0796 18.4452 14.6116 17.9532 14.7216 16.9572C15.0316 14.1632 15.5716 7.47519 15.5776 7.40719C15.6106 6.99519 15.9756 6.70719 16.3846 6.72019ZM11.3454 0.000488281C12.2634 0.000488281 13.0704 0.619488 13.3074 1.50649L13.5614 2.76749C13.6435 3.18086 14.0062 3.48275 14.4263 3.48938L17.708 3.48949C18.122 3.48949 18.458 3.82549 18.458 4.23949C18.458 4.65349 18.122 4.98949 17.708 4.98949L14.4556 4.98934C14.4505 4.98944 14.4455 4.98949 14.4404 4.98949L14.416 4.98849L4.04162 4.98937C4.03355 4.98945 4.02548 4.98949 4.0174 4.98949L4.002 4.98849L0.75 4.98949C0.336 4.98949 0 4.65349 0 4.23949C0 3.82549 0.336 3.48949 0.75 3.48949L4.031 3.48849L4.13202 3.48209C4.50831 3.43327 4.82104 3.14749 4.8974 2.76749L5.1404 1.55149C5.3874 0.619488 6.1944 0.000488281 7.1124 0.000488281H11.3454ZM11.3454 1.50049H7.1124C6.8724 1.50049 6.6614 1.66149 6.6004 1.89249L6.3674 3.06249C6.33779 3.21068 6.29467 3.3535 6.23948 3.48976H12.2186C12.1634 3.3535 12.1201 3.21068 12.0904 3.06249L11.8474 1.84649C11.7964 1.66149 11.5854 1.50049 11.3454 1.50049Z" fill="black"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$Elections->links()}}
            </div>
        </div>
    </div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.getElementById('date_input');
    const dateButton = document.getElementById('date_button');

    // Masquer l'input par défaut
    dateInput.style.display = 'none';

    // Afficher l'input au clic sur le bouton
    dateButton.addEventListener('click', function() {
      dateInput.style.display = 'block';
      dateButton.textContent = 'Sélectionnez une date';
    });

    // Soumettre le formulaire lorsque l'utilisateur sélectionne une date
    dateInput.addEventListener('change', function() {
      dateButton.textContent = 'Génération en cours...';
      dateButton.disabled = true;

      const form = document.querySelector('.date-form'); // Sélectionner le formulaire
      const formData = new FormData(form); // Créer un objet FormData

      fetch("{{route('admin.election.generate')}}", {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Masquer le bouton et afficher le message de succès
          dateButton.style.display = 'none';
          const successMessage = document.createElement('p');
          successMessage.textContent = data.message;
          form.appendChild(successMessage);
        } else {
          // Afficher le message d'erreur
          alert(data.error);
          dateButton.textContent = "Générer elections";
          dateButton.disabled = false;
        }
      })
      .catch(error => {
        console.error(error);
        dateButton.textContent = 'Générer elections';
        dateButton.disabled = false;
      });
    });
  });
</script>


</body>
</html>
