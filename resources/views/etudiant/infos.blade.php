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
            <form action="" id="step2Form" method="POST" class="state">

            <h2>Cher {{Auth::user()->name}}</h2>
            <p>Ajoute une photo de profils et une description textuelle pour permettre aux electeurs de vous connaitre et savoir vos intensions.</p>
            <div class="avatars">
                <svg width="101" class="avatar" height="100" viewBox="0 0 101 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_318_4724)">
                    <rect x="0.5" width="100" height="100" rx="50" fill="#F1F1F1"/>
                    <rect x="30.5" y="16" width="40" height="40" rx="20" fill="#D9D9D9"/>
                    <rect x="-24.5" y="67" width="150" height="150" rx="75" fill="#D9D9D9"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_318_4724">
                    <rect x="0.5" width="100" height="100" rx="50" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
                <svg  class="pencil" width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg"onclick="openFile()">
                    <circle cx="20.5" cy="20" r="18" fill="#0066FF" stroke="#FEFEFE" stroke-width="4"/>
                    <rect width="18" height="18" transform="translate(11.5 11)" fill="#0066FF"/>
                    <path d="M21.445 13.6999L15.2875 20.2174C15.055 20.4649 14.83 20.9524 14.785 21.2899L14.5075 23.7199C14.41 24.5974 15.04 25.1974 15.91 25.0474L18.325 24.6349C18.6625 24.5749 19.135 24.3274 19.3675 24.0724L25.525 17.5549C26.59 16.4299 27.07 15.1474 25.4125 13.5799C23.7625 12.0274 22.51 12.5749 21.445 13.6999Z" stroke="#FEFEFE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20.4175 14.7876C20.74 16.8576 22.42 18.4401 24.505 18.6501" stroke="#FEFEFE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.75 27.5H27.25" stroke="#FEFEFE" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

            </div>
            <input type="file" id="profilePicture" name="profilePicture" style="display: none;" onchange="previewImage(this)">
            <div class="inputs" >
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="32" rows="4">Description</textarea>
            </div>
            <button class="button">Enregistrer</button>
            </form>
        </div>
    </div>
    <script>

        function openFile() {
            document.getElementById('profilePicture').click();
        }

        // Fonction pour prévisualiser l'image choisie dans le premier SVG (avatar)
        function previewImage(input) {
            const reader = new FileReader();

            reader.onload = function (e) {
            const avatar = document.querySelector('.avatar');
            avatar.innerHTML = ''; // Nettoyer le contenu du SVG
            avatar.innerHTML = `<image xlink:href="${e.target.result}" width="100%"  clip-path="url(#clip0_318_4724)"/>`;
            }

            reader.readAsDataURL(input.files[0]);
        }



        const step2Form = document.getElementById('step2Form');
        step2Form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const profilePicture = document.getElementById('profilePicture').files[0];
            const description = document.getElementById('description').value;

            // Retrieve selected post and election data from localStorage
            const selectedPost = localStorage.getItem('selectedPost');
            const selectedElection = localStorage.getItem('selectedElection');

            // Prepare form data to send to the server
            const formData = new FormData();
            formData.append('photo', profilePicture);
            formData.append('description', description);
            formData.append('type', selectedPost);
            formData.append('election_id', selectedElection);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send the form data to the server using AJAX
            // Send the form data to the server using AJAX
            fetch("{{ route('etudiant.storeInfos')}}", {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },

            method: 'POST',
            body: formData
            }).then(response => {
            if (response.ok) {
                // Handle successful update
                return response.json(); // Parse the response as JSON
            } else {
                // Handle error response
                console.error('Error updating profile:', response.statusText);
                return Promise.reject(); // Reject the promise for error handling
            }
            }).then(data => {
                if (data && data.message) {
                    console.log(data.message); // Display the success message from the server
                    if (data.redirect) {
                        window.location.href = data.redirect; // Redirect the user
                    }
                } else {
                    console.warn('Unexpected response format from server (success)');
                }
            }).catch(error => {
                console.error('Error submitting application:', error);
                // You can display an error message to the user here
            });
        });

    </script>
</body>
</html>
