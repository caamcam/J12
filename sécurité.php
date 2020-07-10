<?php

if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
 
 
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))&& (isset($_POST['annee_debut_scolarite']) && !empty($_POST['annee_debut_scolarite']))&& (isset($_POST['annee_fin_scolarite']) && !empty($_POST['annee_fin_scolarite'])) && (isset($_POST['situation_actuelle']) && !empty($_POST['situation_actuelle']))) {
 

 
	if ($_POST['pass'] != $_POST['pass_confirm']) {
 
		$erreur = 'Les 2 mots de passe sont différents.';
 
	} 
	else {
 
		$connexion = mysqli_connect ('localhost', 'root', '', 'mysql');
 
 
 
		$sql = 'SELECT count(*) FROM membres WHERE login="'.mysqli_escape_string($connexion, $_POST['login']).'"';
 
		$req = mysqli_query($connexion, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error($connexion));
 
		$data = mysqli_fetch_array($req);
 
 
 
		if ($data[0] == 0) {
 
		$sql = 'INSERT INTO membres VALUES( "'.mysqli_escape_string($connexion, $_POST['login']).'", "'.mysqli_escape_string($connexion, $_POST['email']).'", "'.mysqli_escape_string($connexion, md5($_POST['pass'])).'","'.mysqli_escape_string($connexion, $_POST['annee_debut_scolarite']).'", "'.mysqli_escape_string($connexion, $_POST['annee_fin_scolarite']).'", "' .mysqli_escape_string($connexion, $_POST['situation_actuelle']).'")';
 
		$req = mysqli_query($connexion, $sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error($connexion));
 
    }
		session_start();
 
		$_SESSION['login'] = $_POST['login'];
 
		header('Location: membre.php');
 
		exit();
 
		}
        {
		else 
 
		$erreur = 'Un membre possède déjà ce login.';
 
         }
        }

         ?>