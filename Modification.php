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
        $password = $_POST['password'];
        $phone=$_POST['Phone'];
        $photo = $_POST['Photo'];
        $sql = "SELECT * FROM users WHERE Email_User='$email'";
        $req = mysqli_query($connection, $sql);
        

        if (mysqli_num_rows($req) > 0) {
            echo("Email or User already exist!");
        } else {
             if(empty($photo))
            {         
            $client = "Update users SET Name_User='$namelogin', Email_User='$email', password_user='$password',Phone='$phone' WHERE IdU=$id";
            }
            else{
            $client = "Update users SET Name_User='$namelogin', Email_User='$email', password_user='$password', Phone='$phone', Photo='./images/Icones/$photo' WHERE IdU=$id";
            }
            $query = mysqli_query($connection, $client) or die('Erreur SQL !' . $client . '<br>' . mysqli_error($connection));

            if ($query) {
                
            $_SESSION['Update'] = "Utilisateur edité avec succès.";
			header('location:detailUser.php');
                
                exit();
            } else {
                $_SESSION['Update'] = "";
			    header('location:detailUser.php');
                exit();
            }
        }
		mysqli_close($connection);
        
    }
}

?>