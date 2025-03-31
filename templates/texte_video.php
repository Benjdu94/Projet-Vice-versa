<!-- Page des options -->
<div class="container">
    <div class="row">
        <div class="col-12" id="text-checkbox" aria-describedby="invalidtextcheckboxs">
            <h3 class="mb-3">A partir du texte à traduire: </h3>
            <div class="row row-cols-2"> <!-- souscol1 -->
                <!-- 1er ligne  -->
                <div class="col-9 padd-b">
                    Traduction brut (avec fond à incruster à vos soins)
                </div>
                <div class="col-1">
                    <label class="switch">
                        <input type="checkbox" name="check_texte[]" value="brut"/>
                        <span class="slider"></span>
                    </label>
                </div>
                <!-- 2eme ligne -->
                <div class="col-9 padd-b">
                    Traduction avec montage simple (Fond couleur unique)
                </div>
                <div class="col-1">
                    <label class="switch">
                        <input type="checkbox" name="check_texte[]" value="simple"/>
                        <span class="slider"></span>
                    </label>
                </div>
                <!-- 3eme ligne  -->
                <div class="col-9 padd-b">
                    Traduction avec montage complexe (Insertion des images ou création de l'animation)
                </div>
                <div class="col-1">
                    <label class="switch">
                        <input type="checkbox" name="check_texte[]" value="complexe"/>
                        <span class="slider"></span>
                    </label>
                </div>
            </div><!-- souscol1 -->
        </div>
        <div id="invalidtextcheckboxs" class="invalid-feedback">
            Veuillez cocher au moins une des 3 options ci-dessus
        </div>
        

        <div class="col-12" id="video-checkbox" aria-describedby="invalidvideocheckboxs">
            <h3 class="mt-4 mb-3">A partir de la vidéo à traduire: </h3>
            <div class="row row-cols-2"> <!-- souscol2 -->
                <!-- 1er ligne  -->
                <div class="col-9 padd-b">
                    Traduction avec montage complexe (Insertion des images ou création de l'animation)
                </div>
                <div class="col-1"> <!-- Checkbox  -->
                    <label class="switch">
                        <input type="checkbox" name="check_video[]" value="montage complexe"/>
                        <span class="slider"></span>
                    </label>
                </div>
                <!-- 2eme ligne -->
                <div class="col-9 padd-b">
                    Traduction avec montage synchronisé
                </div>
                <div class="col-1">
                    <label class="switch">
                        <input type="checkbox" name="check_video[]" value="montage synchronisé"/>
                        <span class="slider"></span>
                    </label>
                </div>
            </div><!-- souscol2 -->
        </div>
        <div id="invalidvideocheckboxs" class="invalid-feedback">
            Veuillez cocher au moins une des 2 options ci-dessus
        </div>

        <div class="col-12">
            <div class="row row-cols-2"> <!-- souscol3 -->
                <!-- 1er ligne  -->
                <div class="col-9">
                    <h4 class="mt-4">Sous-titrage:</h4>
                </div>
                <div class="col-1">
                    <label class="switch mt-4">
                        <input type="checkbox" name="soustitrage" value="1"/>
                        <span class="slider"></span>
                    </label>
                </div>
            </div><!-- souscol3 -->
        </div>
        <div class="col-12" id="file-checkbox" aria-describedby="invalidfilecheckboxs">
            <div class="mt-4">
                <h4 class="mb-2">Format export *:</h4>
                <input type="checkbox" id="box-1" name="format[]" value="mov">
                <label for="box-1">.mov</label>
                <input type="checkbox" id="box-2" name="format[]" value="mp4">
                <label for="box-2">.mp4</label>
                <input type="checkbox" id="box-3" name="format[]" value="mpeg">
                <label for="box-3">.mpeg</label>
            </div>
        </div>
        <div id="invalidfilecheckboxs" class="invalid-feedback">
            Veuillez cocher au moins un format
        </div>
    </div>
</div>