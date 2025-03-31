
<div class="container mx-auto text-center"><!-- options -->
    <h2 class="mx-auto text-center">Nous avons besoin de:</h2>
        <p class="mx-auto text-center" id="besoin">Un fichier Word du texte à traduire *</p>
            <div id="file_group" class="input-group mb-3 upload mx-auto text-center">    
                <div id="choisirFile" aria-describedby="invalidFile" class="form-control lien-wetransfer mx-auto">Importez fichier de word</div>
                <input type="file" id="formFile" class="form-control file-buton" name="fichier" required hidden onchange="return isFileChecked(this.files[0].name);"/>
                <label class="icon" for="formFile" id="button-addon2"><img class="icon-file" src="public/images/file.png" width="25"alt=""></label>
            </div>
            <div id="invalidFile" class="invalid-feedback mx-auto text-center">
                    Fichier sous format autorisé : "doc/docx/txt/rtf"
            </div>
            
            <p class="mt-5 mx-auto text-center" id="besoin">Une ou plusieurs vidéos si nécessaire à upload sur WeTransfer</p>
            <input class="form-control lien-wetransfer mx-auto mb-4" type="url" id ="url" name="Lien" placeholder="https://lienWeTransfer.com">
</div>