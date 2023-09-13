<?php
//deconnexion
if(isset($_GET['logout'])){
	//on vide les infos du users de la session
	$_SESSION['username']= NULL;

	//on créer un msg de confirm
	// flash_in('success', 'Vous vous êtes déconnecté');
	header('Location: .');
	exit();

	//redirige
}