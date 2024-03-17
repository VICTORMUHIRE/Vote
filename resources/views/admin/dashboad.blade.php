@include('shared.base')
@section('content')    

        <div class="container1">
            <div class="containter-child">
                <div class="ajouter" onclick="popUP()">
                    <a href="#"><svg id="plus" fill="#000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path class="pat" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z  "/></svg>
                    <p>Ajouter Client</p></a>
                </div>
                <div class="Client">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>password</th>
                            <th>solde</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id='tableBody'>
                        
                    </tbody>
                </table>
                
                </div>
            </div>
        </div>
    
@endsection

<div class="ajouter-client">     
    <div class= "client-child">
        <form action="../controllers/enregistrerClient.php" method="POST">                                 
            <h2>Ajouter un Client</h2>
            <div>
                <label for="">Nom</label>
                <input class="input2" type="text" name="nom" required>
                
            </div>
            <div>
                <label for="">password</label>
                <input class="input2" type="text" name="pasword" required>
                
            </div>
            <div>
                <label for="">Solde</label>
                <input class="input2" type="number" name="solde" required>
                
            </div>                   
            <button type="submit" value="Envoyer">Enregistrer</button>         
        </form>  
    </div>          
</div> 

<script>    
    ajouter_lient = document.querySelector(".ajouter-client");

    function popUP(e) {
        ajouter_lient.classList.toggle("visible")
        
    }
</script>