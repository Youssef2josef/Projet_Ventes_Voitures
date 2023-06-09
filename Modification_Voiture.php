<?php
session_start();

// Connexion à MySQL
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if (isset($_POST['bouton'])) { 
        $id = $_POST['id'];
        $CARROSSERIE = $_POST['CARROSSERIE'];
        $Prix = $_POST['Prix'];
        $Disponibilité = $_POST['Disponibilité'];
        $BOÎTE=$_POST['BOÎTE'];
        $ENERGIE = $_POST['ENERGIE'];
        // $sql = "SELECT * FROM users WHERE Email_User='$email'";
        // $req = mysqli_query($connection, $sql);
        

       
            $client = "Update voitures SET CARROSSERIE='$CARROSSERIE', Prix='$Prix', Disponibilité='$Disponibilité', BOÎTE='$BOÎTE', ENERGIE='$ENERGIE' WHERE IdV=$id";
            
            $query = mysqli_query($connection, $client) or die('Erreur SQL !' . $client . '<br>' . mysqli_error($connection));

            if ($query) {
                
            $_SESSION['Création'] = "Voiture édité avec succès.";
			header('location:detailVoiture.php');
                
                exit();
            } else {
                $_SESSION['Création'] = "";
			    header('location:detailVoiture.php');
                exit();
            }
        }
		mysqli_close($connection);
        
    }


?>