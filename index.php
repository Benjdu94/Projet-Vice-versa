<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vice & Versa</title>
  <link rel="stylesheet" type="text/css" href="public/css/nav.css">
  <link rel="stylesheet" type="text/css" href="public/css/accueil.css">
  <link rel="stylesheet" type="text/css" href="public/css/qui_sommesnous.css">
  <link rel="stylesheet" type="text/css" href="public/css/realisations.css">
  <link rel="stylesheet" type="text/css" href="public/css/chiffres.css">
  <link rel="stylesheet" type="text/css" href="public/css/clients.css">
  <link rel="stylesheet" href="dist/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="dist/owl.carousel.css">
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
	
	<!-- NAV -->
	<?php require_once('templates/nav.php'); ?>
	
	<!-- SECTION_1 -->
	<?php require_once('templates/accueil.php'); ?>
	
	<!-- SECTION 2 -->
	<?php require_once('templates/qui_sommesnous.php'); ?>
	
	<!-- SECTION 3 -->
	<?php require_once('templates/realisations.php'); ?>

	<!-- SECTION 4 CHIFFRES -->
	<?php require_once('templates/chiffres.php'); ?>
		
	<!-- SECTION 5 -->
	<?php require_once('templates/clients.php'); ?>

    <!-- FOOTER -->
    <?php require_once('templates/footer.php');?>
	
	<!-- JS -->
	<script src="dist/bootstrap.bundle.min.js"></script>
	<script src="dist/jquery-3.6.0.min.js"></script>
	<script src="dist/owl.carousel.min.js"></script>
	<script src="public/js/chiffres.js"></script>
	<script src="public/js/clients.js"></script>
	<script src="public/js/hamburgeranim.js"></script>
	<script src="public/js/copyright.js"></script>
</body>
</html>

