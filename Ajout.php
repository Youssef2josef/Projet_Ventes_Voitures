<?php
session_start();

// Connexion à MySQL
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if (isset($_POST['bouton'])) { // Autre contrôle pour vérifier si la variable $_POST['bouton'] est bien définie
        $namelogin = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone=$_POST['Phone'];
        $photo = $_POST['Photo'];
        $sql = "SELECT * FROM users WHERE Email_User='$email' OR Name_User='$namelogin'";
        $req = mysqli_query($connection, $sql);

        if (mysqli_num_rows($req) > 0) {
            echo("Email or User already exist!");
        } else {
             if(empty($photo))
            {         
            $client = "INSERT INTO users (Name_User, Email_User, password_user,Phone) VALUES ('$namelogin', '$email', '$password', '$phone') ";
            }
            else{
            $client = "INSERT INTO users (Name_User, Email_User, password_user,Phone,Photo) VALUES ('$namelogin', '$email', '$password', '$phone' ,'./images/Icones/$photo')";
            }
            $query = mysqli_query($connection, $client) or die('Erreur SQL !' . $client . '<br>' . mysqli_error($connection));

            if ($query) {
                
            $_SESSION['Création'] = "Utilisateur Ajouté avec succès.";
			header('location:detailUser.php');
                
                exit();
            } else {
                $_SESSION['Création'] = "";
			    header('location:detailUser.php');
                exit();
            }
        }
		mysqli_close($connection);
        
    }
}

?>