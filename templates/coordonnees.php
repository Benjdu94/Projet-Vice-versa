<div class="particulier-coordonnees mx-auto text-center" name="parti-coord">

    <p class="mx-auto text-center info-particulier" id="particulier" name="particulier">Entrez vos informations</p>
    <p class="mx-auto text-center info-entreprise" id="entreprise" name="entreprise">Entrez les informations concernant votre entreprise</p>
                        
        <div class="row w-60 g-3">
            <!-- Entreprise -->
            <div class="col-12 etp">
                <input type="text" class="form-control form-control-lg infos " id="etp" name="Etp" value="" placeholder="Nom de l'entreprise" required>
            </div>
            <!-- Nom -->
            <div class="col-12">
                <input type="text" class="form-control form-control-lg infos" name="nom" placeholder="Nom" required>
            </div>
            <!-- Prénom -->
            <div class="col-12">
                <input type="text" class="form-control form-control-lg infos" name="prenom" placeholder="Prénom" required>
            </div>
            <!-- Adresse -->
            <div class="col-12">
                <input type="text" class="form-control form-control-lg infos" name="adresse" placeholder="Adresse" required>
            </div>
            <div class="col-sm-8">
                <input type="text" class="form-control form-control-lg infos" name="ville" placeholder="Ville" required>
            </div>
            <div class="col-sm">
                <input type="text" class="form-control form-control-lg infos" name="cp" value="" placeholder="CP" maxlength="5" required>
            </div>
            <!-- Email -->
            <div class="col-12">
                <input type="text" class="form-control form-control-lg infos" id ="email" name="email" aria-describedby="invalideInputs" value="" placeholder="Email" required>
            </div>
            <!-- siret -->
            <div class="col-12 siret">
                <input type="text" class="form-control form-control-lg infos " id="siret" name="Siret" value="" placeholder="SIRET" maxlength="14">
            </div>
            <div id="invalideInputs" class="invalid-feedback mx-auto text-center">
                    Veuillez remplir tous les champs !
            </div> 
        </div>  
                   
</div>
