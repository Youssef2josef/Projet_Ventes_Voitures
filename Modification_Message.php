<?php
session_start();

// Connexion à MySQL
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if (isset($_POST['bouton'])) { 
        $id = $_POST['id'];
        $namelogin = $_POST['name'];
        $email = $_POST['email'];
        $N°tel = $_POST['N°tel'];
        $phone=$_POST['Phone'];
       
        

        
            
            $client = "Update messages SET U_Name='$namelogin', User_Email='$email', User_Number='$N°tel', Message_Contenu='$phone' WHERE IdM=$id";
            
            $query = mysqli_query($connection, $client) or die('Erreur SQL !' . $client . '<br>' . mysqli_error($connection));

            if ($query) {
                
            $_SESSION['Update'] = "Message edité avec succès.";
			header('location:detailMessage.php');
                
                exit();
            } else {
                $_SESSION['Update'] = "";
			    header('location:detailMessage.php');
                exit();
            
        }
		mysqli_close($connection);
        
    }
}

?>