<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{asset('stylemob.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>login</title>
</head>
<body class="body">
    <div id="grid" class="grid">
        <h1 class="h1-mob">Bienvenue encore</h1>
        <p class="p-mob">Creer un mot de passe ici</p>
        <div class="img-vote">
            <img src="./assets/image/voting.png" alt="">
        </div>
        <form action="{{ route('login') }}" method="post" class="form" id="resetPasswordForm">
            <h1 class="h1-desk">Bienvenue encore</h1>
            <p class="p-desk">Creer un mot de passe ici</p>

            <div class="alert alert-danger mt-3" id="passwordMismatchAlert" style="display: none;">
                Les mots de passe ne correspondent pas.
            </div>
                @csrf
                @include('shared.input',['label'=>'Email','name'=>'email','type'=>'email','value'=>''])
                @include('shared.input',['label'=>'password','name'=>'password','value'=>''])

                <button type="submit" class="button">Se connecter</button>
                <div class="text-end">
                    <a href="{{route('create.password')}}">Creer mot de passe</a>
                </div>
        </form>
    </div>
</body>
</html>
