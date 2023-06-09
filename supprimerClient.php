<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if(isset($_GET['id'])){
    	$id = $_GET['id'];
        $User="delete from users where IdU=$id";
        $exec_requete = mysqli_query($connection,$User);
        if($exec_requete){
            $_SESSION['info'] = "Utilisateur supprimé avec succès.";
			header('location:detailUser.php');
            
        }else{
            $_SESSION['info'] = "Erreur en suppression";
			header('location:detailUser.php');
        }
        }
		mysqli_close($connection);

}
?>