<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('stylemob.css')}}">
    <title>Document</title>
</head>
<body>

    <div class="grid">
        <div class="header">Modifier les informations</div>
        <div class="alert alert-success mt-3" id="passwordMismatchAlert" style="display: none; grid-column: 2/12">
            La candidature a été envoyée avec succès.
        </div>
        <div class="state">
            <h2>Cher {{Auth::user()->name}}</h2>
            <p>Merci beacoup d'avoir postuler, veiller voir votre superviseur
                @if ($superviseur)
                   <strong> {{$superviseur->name}} </strong>
                @endif
                pour valiser la candidature</p>
            <a href="#" class="button">Fermer</a>
        </div>
    </div>
</body>
</html>
