<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/devis_V2.css">
    <title>Devis</title>
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
</head>
<body id="body-devis">

<!-- NAV -->
<?php require_once('templates/nav.php'); ?>
<!-- Partie de DEVIS -->

<section id="devis"><!-- SECTION -->

    <div class="row align-items-center col-12 zeromargin-col2 min-vh-100">

        <div class="col min-vh-100 background-ecran"></div><!-- Colonne 1 -->

        <div class="col"><!-- Colonne 2 -->

            <h1 class="mt-3 mx-auto text-center">Devis</h1>

            <form class="mt-3" id="formulaire" method="post" enctype="multipart/form-data" action="envoi_devis.php" name="devis-infos"><!-- formulaire -->

                <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>

                <!-- 1er page avec des sélections entre Particulier et Entreprise -->
                <div class="tab"> <!-- tab 1 -->
                    <?php require('templates/radios.php');?>
                </div> <!-- tab 1 -->

                <!-- Page des coordonnées de particulier et entreprise-->
                <div class="tab"><!-- tab 2 -->
                    <?php require('templates/coordonnees.php');?>
                </div><!-- tab 2 -->

                <div class="tab"><!-- tab 3 -->
                    <!-- Options: Besoin word et video -->
                    <?php require('templates/besoin.php');?>
                </div><!-- tab 3 -->

                <!-- Options: Des choix et format video -->
                <div class="tab"><!-- tab 4 -->
                    <?php require('templates/texte_video.php');?>
                </div><!-- tab 4 -->

                <!-- Options: Date et commentaire -->
                <div class="tab"><!-- tab 5 -->
                    <?php require('templates/date_com.php');?>
                </div>

                <div style="overflow:auto;" id="nextprevious">
                    <div class="mx-auto text-center">
                        <button class ="previous mb-5" type="button" id="prevBtn" onclick="nextPrev(-1)">Précédent</button>
                        <button class="next mb-5" type="button" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                    </div>
                </div>

                <div class="thanks-message text-center" id="text-message"> <img class="mt-4" src="public/images/validation.png" alt="" width="100">
                    <h3>Votre demande de devis a bien été créé.</h3> <span>Nous vous répondrons bientôt.</span> <span><a href="index.php">Aller</a></span>
                </div>
            </form><!-- Fin de formulaire -->

        </div><!-- Colonne 2 -->
    </div>
</section><!-- SECTION -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="public/js/script.js"></script>
<script src="dist/bootstrap.bundle.min.js"></script>


</body>
</html>