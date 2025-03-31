<?php
 
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $ville = strtoupper(htmlspecialchars($_POST['ville']));
        $cp = htmlspecialchars($_POST['cp']);
        $email = htmlspecialchars($_POST['email']);
        $siret = htmlspecialchars($_POST['Siret']);
        $lien = htmlspecialchars($_POST['Lien']);
        $date = date('d/m/Y', strtotime($_POST['date']));
        $commentaire = htmlspecialchars($_POST['commentaire']);

        //Lien WeTransfer
        if(!empty($_POST['Lien'])){
            $lien = $_POST['Lien'];

        } else {
            $lien = "";
        }

        //Checkbox
        $checkTexte = "";
        if(!empty($_POST['check_texte'])){
            for($j=0;$j<=2;$j++){
                if(isset($_POST['check_texte'][$j])){
                    $checkTexte .= $_POST['check_texte'][$j].' | ';
                }
            }
        }
        
        $checkVideo = "";
        if(!empty($_POST['check_video'])){
            for($j=0;$j<=2;$j++){
                if(isset($_POST['check_video'][$j])){
                    $checkVideo .= $_POST['check_video'][$j].' | ';
                }
            }
        }
        
        $format = "";
        if(!empty($_POST['format'])){
            for($i=0;$i<=2;$i++){
                if(isset($_POST['format'][$i])){
                    $format .= $_POST['format'][$i].' | ';
                }
            }
        }
        
        if(isset($_POST['soustitrage'])){
            $soustitrage = "Oui";
        } else {
            $soustitrage = "Non";
        }
        
        $isSuccess = true;
        
        // echo $prenom.' '.$nom.' '.$adresse.' '.$cp.' '.$ville.' '.$siret.' '.$lien.' '.$checkTexte.' '.$checkVideo.' '.$format.' '.$soustitrage.' '.$date.' '.$commentaire;
                                                                      
        if($isSuccess){

            //Verifie si le fournisseur prend en charge les r
            if(preg_match("#@(hotmail|live|msn).[a-z]{2,4}$#", $email_from)){
                $passage_ligne = "\n";
            }else{
                $passage_ligne = "\r\n";
            }

            $email_to = "vincent.sourdoues@gmail.com"; //Destinataire
            $email_subject = "Demande de devis"; //Sujet du mail
            $boundary = md5(rand()); // clé aléatoire de limite

            //Nettoyer le message
            function clean_string($string) {
                $bad = array("content-type","bcc:","to:","cc:","href");
                return str_replace($bad,"",$string);
            }

            //Headers
            $headers = "From: \"".$nom." ".$prenom."\"<".$email.">" . $passage_ligne; //Emetteur
            $headers.= "Reply-to: \"".$nom." ".$prenom."\" <".$email.">" . $passage_ligne; //Emetteur
            $headers.= "MIME-Version: 1.0" . $passage_ligne; //Version de MIME
            $headers.= 'Content-Type: multipart/mixed; boundary='.$boundary .' '. $passage_ligne; //Contenu du message (alternative pour deux versions ex:text/plain et text/html

            //Message HTML
            $email_message = '--' . $boundary . $passage_ligne; //Séparateur d'ouverture
            $email_message .= "Content-Type: text/html; charset='utf-8'" . $passage_ligne; //Type du contenu
            $email_message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne; //Encodage
            $email_message .= $passage_ligne.'<html>  
                                                <head>
                                                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                                    <title>Demande de devis</title>
                                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                    <style>

                                                        @import url("https://fonts.googleapis.com/css2?family=Lato&display=swap");
                                                        
                                                        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap");
                                                        
                                                        @import url("https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap");



                                                        .devis span{font-family: \'Lato\', sans-serif;color: black;font-weight: 700;font-size: 40px; margin: 25px 0;}

                                                        

                                                        .section1 span{font-size:16px;color:black;font-family: \'Lato\', sans-serif;font-weight: 300;}

                                                        .table1{width:750px;}
                                                        span{font-size:16px;color:black;font-family: \'Lato\', sans-serif;font-weight: 300;}
                                                        .table1 tr, .table1 td{border:1px solid black;font-family: \'Lato\', sans-serif;font-weight: 300;}
                                                        .table1 .border-none{border:none!important;}
                                                        table {
                                                            table-layout: fixed;
                                                            width: 100%;
                                                            border-collapse: collapse;
                                                            border: 2px solid black;
                                                        }
                                                            
                                                        th, td {
                                                            padding: 20px;
                                                        }
                                                    </style>
                                                </head>
                                                    <body>
                                                        <section>
                                                        
                                                            <table cellspacing="0" cellpadding="0" border="0" style="border:none;">
                                                                <td class="devis">
                                                                    <span>DEVIS</span>
                                                                </td>
                                                                <td class="devis">
                                                                    
                                                                </td>
                                                                
                                                                <td>
                                                                    <img src="http://pratique.sourdoues.com/public/images/Logo_vice&versa_noir.jpg" alt="Logo_Vicetversa" style="display: block;" height="100" align="right" loading="lazy"/>
                                                                </td>
                                                            </table>
                                                    
                                                        <table cellspacing="0" cellpadding="0" border="0" style="border:none;" class="section1">
                                                            <span><b>'.$nom.' '.$prenom.'</b></span><br>
                                                            <span>'.$adresse.'</span><br>
                                                            <span>'.$cp.' '.$ville.'</span><br>
                                                            <span>Adresse mail : '.$mail.'</span><br>
                                                            <span>Siret de l\'entreprise : '.$siret.'</span><br>
                                                            
                                                        </table>
                                                    

                                                        <table cellspacing="0" cellpadding="0" border="1" class="table1" >
                                                            <tr>
                                                                <td></td>
                                                                <td></td>                                            
                                                            </tr>
                                                            <tr>
                                                                <td><b>Lien de WeTransfer</b></td>
                                                                <td>'.$lien.'</td>                                                            
                                                            </tr>
                                                            <tr>
                                                                <td><b>Choix pour le texte à traduire</b></td>
                                                                <td>'.$checkTexte.'</td>                                                                
                                                            </tr>
                                                            <tr>
                                                                <td><b>Choix pour une vidéo à traduire</b></td>
                                                                <td>'.$checkVideo.'</td>                                                              
                                                            </tr>
                                                            <tr>
                                                                <td><b>Choix de format</b></td>
                                                                <td>'.$format.'</td>                                                              
                                                            </tr>
                                                            <tr>
                                                                <td><b>Sous-titrage</b></td>
                                                                <td>'.$soustitrage.'</td>                                                               
                                                            </tr>
                                                        </table>
                                                                                                        
                                                        
                                                        <br><span><b>Date délai souhaité:</b> '.$date.'</span><br><br>                                                              
                                                        

                                                        <span>Commentaire :</span>
                                                        <table cellspacing="0" cellpadding="0" border="1" class="table1" >
                                                            <tr>
                                                                <span>'.clean_string($commentaire).'</span>                                           
                                                            </tr>
                                                            
                                                        </table>

                                                        </section>
                                                    </body>
                                                </html>'.$passage_ligne;

        //Pièce jointe 
        if(isset($_FILES["fichier"]) && $_FILES['fichier']['name'] != ""){ //Vérifie sur formulaire envoyé et que le fichier existe
            $nom_fichier = $_FILES['fichier']['name'];
            $source = $_FILES['fichier']['tmp_name'];
            $type_fichier = $_FILES['fichier']['type'];
            $taille_fichier = $_FILES['fichier']['size'];
                        
            if($nom_fichier != ".htaccess"){ //Vérifie que ce n'est pas un .htaccess
                if($type_fichier == "text/plain" 
                   || $type_fichier == "application/msword" 
                   || $type_fichier == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                   || $type_fichier == "application/rtf"){ //Soit un jpeg soit un pdf
           
                if ($taille_fichier > 0){ //Taille supérieure à 0 octet
                   if ($taille_fichier <= 2097152) { //Taille égale ou supérieure à 2 Mo (en octets)
                       $tabRemplacement = array("é"=>"e", "è"=>"e", "à"=>"a"); //Remplacement des caractères spéciaux
           
                       $handle = fopen($source, 'r'); //Ouverture du fichier
                       $content = fread($handle, $taille_fichier); //Lecture du fichier
                       $encoded_content = chunk_split(base64_encode($content)); //Encodage
                       $f = fclose($handle); //Fermeture du fichier
           
                       $email_message .= $passage_ligne . "--" . $boundary . $passage_ligne; //Deuxième séparateur d'ouverture
                       $email_message .= 'Content-type:'.$type_fichier.';name="'.$nom_fichier.'"'."\n"; //Type de contenu (application/pdf ou image/jpeg)
                       $email_message .='Content-Disposition: attachment; filename="'.$nom_fichier.'"'."\n"; //Précision de pièce jointe
                       $email_message .= 'Content-transfer-encoding:base64'."\n"; //Encodage
                       $email_message .= "\n"; //Ligne blanche. IMPORTANT !
                       $email_message .= $encoded_content."\n"; //Pièce jointe
           
                        }else{
                            //Message d'erreur
                            $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais celle ci était superieure à 2Mo.". $passage_ligne;
                        }
                    }else{
                        //Message d'erreur
                        $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais celle ci était à 0 octet donc vide.". $passage_ligne;
                    }
               }else{
                   //Message d'erreur
                   $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais elle n'était pas au bon format.". $passage_ligne;
               }
           }else{
               //Message d'erreur
               $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe .htaccess.". $passage_ligne;
           }
        }
      
        //Fin
        $email_message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne; //Séparateur de fermeture

        //Function mail()
        mail($email_to,$email_subject, $email_message, $headers);//Envoi du mail

        }
    }
 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/devis_V2.css">
    <link rel="stylesheet" href="public/css/devismail.css">
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

           

            <div class="text-center" id="text-message"> <img class="my-4" src="public/images/validation.png" alt="" width="100">
                    <h3 class="w-100">Votre demande de devis a bien été créé.</h3> <span>Nous vous répondrons bientôt.</span> <span><a href="index.php">Aller</a></span>
            </div>
        </div><!-- Colonne 2 -->
    </div>
</section><!-- SECTION -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="public/js/script.js"></script>
<script src="dist/bootstrap.bundle.min.js"></script>

</body>
</html>