
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invitation à participer aux élections</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">

</head>
<body>
    <h1>Bonjour, {{ $user->name }}</h1>
    <p>Vous êtes invité à participer aux élections qui se dérouleront prochainement.</p>
    <p>Pour postuler, connectez-vous à l'application  pour creer un mot de passe sur le suivant:</p>
    <p>La date d'ouverture du scrutin est le {{ $election->date_ouverture }}</p>
    <p>N'hésitez pas à vous connecter et à postuler pour participer activement à ces élections.</p>
    <p>Cordialement,</p>
    <p>L'équipe de gestion des élections</p>
</body>
</html>
