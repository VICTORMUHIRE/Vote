<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('stylemob.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>login</title>
</head>

<body >
    <div id="grid" class="grid">
        <h1 class="h1-mob">Bienvenue encore</h1>
        <p class="p-mob">Creer un mot de passe ici</p>
        <div class="img-vote">
            <img src="./assets/image/voting.png" alt="">
        </div>
        <form action="{{ route('store.password') }}" method="post" class="form" id="resetPasswordForm">@csrf
            <h1 class="h1-desk">Bienvenue encore</h1>
            <p class="p-desk">Creer un mot de passe ici</p>

            <div class="alert alert-danger mt-3" id="passwordMismatchAlert" style="display: none;">
                Les mots de passe ne correspondent pas.
            </div>
            @include('shared.input', ['label' => 'Email','name' => 'email','type' => 'email','value' => '',])
            @include('shared.input', ['label' => 'Nouveau password','name' => 'password','type' => 'password','value' => '',])
            @include('shared.input', ['label' => 'confirmer mot de passe','name' => 'password_confirmation','type' => 'password','value' => '',])

            <button type="submit" class="button">Se connecter</button>
        </form>
    </div>

    <script>
        const resetPasswordForm = document.getElementById('resetPasswordForm');
        const passwordInput = document.getElementById('password');
        const passwordConfirmationInput = document.getElementById('password_confirmation');
        const submitButton = resetPasswordForm.querySelector('button');
        const passwordMismatchAlert = document.getElementById('passwordMismatchAlert');

        [passwordInput, passwordConfirmationInput].forEach(input => {
            input.addEventListener('input', validatePasswordConfirmation);
        });

        function validatePasswordConfirmation() {
            const password = passwordInput.value;
            const passwordConfirmation = passwordConfirmationInput.value;

            const isPasswordMatch = password === passwordConfirmation;
            submitButton.disabled = !isPasswordMatch;
            submitButton.classList.toggle('disabled', !isPasswordMatch);
            passwordMismatchAlert.style.display = isPasswordMatch ? 'none' : 'block';
        }
    </script>
</body>

</html>
