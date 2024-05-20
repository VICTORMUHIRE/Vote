
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification de supervision des élections</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>  
        <h1>Bonjour, {{ $user->name }}</h1>
        <p>Nous vous informons que vous avez été affecté à la supervision des élections pour la faculté de <strong>{{$user->faculte->name}}</strong>.</p>
        <p>connectez vous sur la plate forme pour creer un mot de passe</p>
                
        <p>Cordialement,</p>
        <p>L'équipe de gestion des élections de l'ULPGL</p>
    </body>
    </html>


