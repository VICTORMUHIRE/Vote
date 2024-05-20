<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('stylemob.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="grid">
        <div class="header">
              <h1>Déposer Candidature</h1>
            </div>
            <div class="guide-candidat">
              <h2>Bonjour {{ Auth::user()->name }}!</h2><br>
              <p>Vous pouvez postuler à n'importe quelle élection vous concernant via ce formulaire. Choisissez le poste dans lequel vous souhaitez postuler (PP, PREFAC, CP) puis cliquez sur le bouton "Continuer".</p>
            </div>
            <form class="depot-form" method="post" id="step1Form">
              <div>
                <label for="type">type</label>
                <select name="type" id="type" onchange="fetchElection(this.value)">
                    <option value="">selectionnez poste</option>
                    <option value="pp">PP</option>
                    <option value="prefac">PREFAC</option>
                    <option value="cp">CP</option>
                </select>
              </div>
              <div>
                    <label for="Election">Election</label>
                    <select name="election_id" id="election_id" class="election-select" disabled>
                    </select>
              </div>

              <button class="button" type="submit" id="continueButton">continuer</button>
            </form>
        <div class="footer-menu">
            <div class="menu">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5111 1.21065C11.8722 0.929784 12.3778 0.929784 12.7389 1.21065L21.7389 8.21065C21.9825 8.4001 22.125 8.69141 22.125 9V20C22.125 20.7957 21.8089 21.5587 21.2463 22.1213C20.6837 22.6839 19.9207 23 19.125 23H5.125C4.32935 23 3.56629 22.6839 3.00368 22.1213C2.44107 21.5587 2.125 20.7957 2.125 20V9C2.125 8.69141 2.26747 8.4001 2.51106 8.21065L11.5111 1.21065ZM4.125 9.48908V20C4.125 20.2652 4.23036 20.5196 4.41789 20.7071C4.60543 20.8946 4.85978 21 5.125 21H19.125C19.3902 21 19.6446 20.8946 19.8321 20.7071C20.0196 20.5196 20.125 20.2652 20.125 20V9.48908L12.125 3.26686L4.125 9.48908Z" fill="#616161"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.125 12C8.125 11.4477 8.57272 11 9.125 11H15.125C15.6773 11 16.125 11.4477 16.125 12V22C16.125 22.5523 15.6773 23 15.125 23C14.5727 23 14.125 22.5523 14.125 22V13H10.125V22C10.125 22.5523 9.67728 23 9.125 23C8.57272 23 8.125 22.5523 8.125 22V12Z" fill="#616161"/>
                </svg>
                <p>Accueil</p>
            </div>

            <div class="menu">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.375 17.8476C18.0142 17.8476 20.6231 17.1242 20.875 14.2205C20.875 11.3188 19.0562 11.5054 19.0562 7.94511C19.0562 5.16414 16.4202 2 12.375 2C8.32977 2 5.69385 5.16414 5.69385 7.94511C5.69385 11.5054 3.875 11.3188 3.875 14.2205C4.12795 17.1352 6.73677 17.8476 12.375 17.8476Z" stroke="#616161" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M14.7637 20.8574C13.3996 22.3721 11.2716 22.3901 9.89441 20.8574" stroke="#0066FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>Notification</p>
            </div>
            <div class="menu">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.4317 7.62337L20.8092 6.54328C20.2827 5.62936 19.1157 5.31408 18.2005 5.83847C17.7649 6.0951 17.2451 6.16791 16.7557 6.04084C16.2663 5.91378 15.8476 5.59727 15.5918 5.16113C15.4273 4.88391 15.3389 4.56815 15.3355 4.2458C15.3504 3.72898 15.1554 3.22816 14.795 2.85743C14.4346 2.48669 13.9395 2.27762 13.4225 2.27783H12.1685C11.662 2.27783 11.1763 2.47967 10.819 2.8387C10.4617 3.19773 10.2622 3.68435 10.2646 4.19088C10.2496 5.23668 9.39748 6.07657 8.35157 6.07646C8.02921 6.07311 7.71346 5.9847 7.43623 5.82017C6.52106 5.29577 5.35411 5.61105 4.82754 6.52497L4.15935 7.62337C3.63341 8.53615 3.9444 9.70236 4.855 10.2321C5.4469 10.5738 5.81153 11.2053 5.81153 11.8888C5.81153 12.5723 5.4469 13.2038 4.855 13.5456C3.94556 14.0717 3.63423 15.2351 4.15935 16.1451L4.79093 17.2344C5.03765 17.6795 5.4516 18.0081 5.94119 18.1472C6.43078 18.2863 6.95564 18.2247 7.39962 17.9758C7.83608 17.7211 8.35619 17.6513 8.84434 17.782C9.33249 17.9126 9.74824 18.2328 9.99916 18.6714C10.1637 18.9486 10.2521 19.2644 10.2555 19.5868C10.2555 20.6433 11.112 21.4998 12.1685 21.4998H13.4225C14.4755 21.4998 15.3305 20.6489 15.3355 19.5959C15.3331 19.0878 15.5339 18.5998 15.8932 18.2405C16.2525 17.8812 16.7405 17.6804 17.2486 17.6829C17.5702 17.6915 17.8846 17.7795 18.1639 17.9392C19.0767 18.4651 20.2429 18.1541 20.7726 17.2435L21.4317 16.1451C21.6868 15.7073 21.7568 15.1858 21.6262 14.6961C21.4956 14.2065 21.1752 13.7891 20.736 13.5364C20.2968 13.2837 19.9764 12.8663 19.8458 12.3767C19.7152 11.8871 19.7853 11.3656 20.0404 10.9277C20.2062 10.6381 20.4464 10.398 20.736 10.2321C21.6411 9.70265 21.9514 8.54325 21.4317 7.63252V7.62337Z" stroke="#616161" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.8001 14.5248C14.256 14.5248 15.4363 13.3445 15.4363 11.8886C15.4363 10.4327 14.256 9.25244 12.8001 9.25244C11.3442 9.25244 10.1639 10.4327 10.1639 11.8886C10.1639 13.3445 11.3442 14.5248 12.8001 14.5248Z" stroke="#616161" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>Setting</p>
            </div>
            <div class="menu">
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.824 14.5396C16.2552 14.5396 19.185 15.0836 19.185 17.2604C19.185 19.4362 16.274 20 12.824 20C9.39285 20 6.46309 19.456 6.46309 17.2802C6.46309 15.1034 9.37404 14.5396 12.824 14.5396ZM18.3101 13.2289C19.6218 13.2046 21.0321 13.3847 21.5532 13.5126C22.6573 13.7296 23.3834 14.1727 23.6843 14.8166C23.9386 15.3453 23.9386 15.9586 23.6843 16.4864C23.224 17.4851 21.7404 17.8058 21.1637 17.8886C21.0446 17.9066 20.9488 17.8031 20.9614 17.6833C21.2559 14.9157 18.9127 13.6035 18.3065 13.3018C18.2805 13.2883 18.2752 13.2676 18.2778 13.255C18.2796 13.246 18.2904 13.2316 18.3101 13.2289ZM7.4406 13.2292C7.4603 13.2319 7.47015 13.2464 7.47194 13.2545C7.47462 13.268 7.46925 13.2878 7.44418 13.3022C6.8371 13.6039 4.49383 14.9161 4.78842 17.6827C4.80095 17.8034 4.70604 17.9061 4.58695 17.889C4.01031 17.8061 2.52663 17.4855 2.06639 16.4867C1.8112 15.9581 1.8112 15.3457 2.06639 14.817C2.36725 14.1731 3.09252 13.73 4.19656 13.512C4.71858 13.385 6.12794 13.2049 7.4406 13.2292ZM12.824 4C15.1601 4 17.0333 5.88227 17.0333 8.23285C17.0333 10.5825 15.1601 12.4666 12.824 12.4666C10.4879 12.4666 8.61474 10.5825 8.61474 8.23285C8.61474 5.88227 10.4879 4 12.824 4ZM18.5384 4.7059C20.7948 4.7059 22.5668 6.84123 21.9633 9.21974C21.5559 10.821 20.0812 11.8846 18.4381 11.8414C18.2734 11.8369 18.1113 11.8216 17.9546 11.7946C17.8409 11.7748 17.7836 11.646 17.848 11.5505C18.4748 10.6229 18.8321 9.50703 18.8321 8.30922C18.8321 7.05918 18.4417 5.8938 17.7639 4.93825C17.7424 4.90853 17.7263 4.8626 17.7478 4.82838C17.7657 4.80046 17.7988 4.78605 17.8301 4.77884C18.0585 4.73201 18.2931 4.7059 18.5384 4.7059ZM7.21093 4.70581C7.45627 4.70581 7.69086 4.73192 7.92009 4.77875C7.95053 4.78596 7.98456 4.80127 8.00246 4.82829C8.02306 4.86251 8.00784 4.90844 7.98635 4.93816C7.30853 5.89371 6.91813 7.05909 6.91813 8.30913C6.91813 9.50694 7.2754 10.6228 7.90218 11.5504C7.96665 11.6459 7.90934 11.7747 7.79563 11.7945C7.63804 11.8224 7.47686 11.8368 7.31211 11.8413C5.66904 11.8845 4.19432 10.8209 3.78691 9.21965C3.18251 6.84114 4.95451 4.70581 7.21093 4.70581Z" fill="#616161"/>
                </svg>
                <p>team</p>
            </div>
        </div>
    </div>

<script>
    function fetchElection(selectedtype) {
      const electionSelect = document.getElementById('election_id');
      const userId = {{ Auth::user()->id }}; // Assuming you have the user ID available

      fetch('/etudiant/elections/' + selectedtype + '/' + userId) // Adjust the URL based on your route
        .then(response => response.json())
        .then(data => {
          electionSelect.innerHTML = ""; // Clear existing options

          if (data.election) {
            const option = document.createElement('option');
            option.value = data.election.id;
            option.text = data.election.name;
            electionSelect.appendChild(option);
          } else {
            const option = document.createElement('option');
            option.value = "";
            option.text = "Aucune élection trouvée";
            electionSelect.appendChild(option);
          }
        })
        .catch(error => {
          console.error('Error fetching election:', error);
          // Handle errors appropriately, e.g., display an error message to the user
        });
    }

    document.getElementById('step1Form').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêcher le formulaire d'être soumis
    });

    const continueButton = document.getElementById('continueButton');
    continueButton.addEventListener('click', function() {
        const post = document.getElementById('type').value;
        const election = document.getElementById('election_id').value;

        // Store selected post and election data in localStorage
        localStorage.setItem('selectedPost', post);
        localStorage.setItem('selectedElection', election);

        // Redirect to the next step (profile-info.blade.php)
        window.location.href = "{{ route('etudiant.infos') }}";
    });
</script>
</body>
</html>
