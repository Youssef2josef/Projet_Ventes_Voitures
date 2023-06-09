<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if(isset($_GET['id'])){
    	$id = $_GET['id'];
        $Voiture="delete from voitures where IdV=$id";
        $exec_requete = mysqli_query($connection,$Voiture);
        if($exec_requete){
            $_SESSION['Création'] = "voiture supprimé avec succès.";
			header('location:detailVoiture.php');
            
        }else{
            $_SESSION['Création'] = "Erreur en suppression";
			header('location:detailVoiture.php');
        }
        }
		mysqli_close($connection);

}
?>