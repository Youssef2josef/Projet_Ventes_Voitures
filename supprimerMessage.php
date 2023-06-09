<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if(isset($_GET['id'])){
    	$id = $_GET['id'];
        $User="delete from messages where IdM=$id";
        $exec_requete = mysqli_query($connection,$User);
        if($exec_requete){
            $_SESSION['info'] = "Message supprimé avec succès.";
			header('location:detailMessage.php');
            
        }else{
            $_SESSION['info'] = "Erreur en suppression";
			header('location:detailMessage.php');
        }
        }
		mysqli_close($connection);

}
?>