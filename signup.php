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
        $confirmp = $_POST['confirmp'];
        $photo = $_POST['photo'];
        
        $sql = "SELECT * FROM users WHERE Email_User='$email' OR Name_User='$namelogin'";
        $req = mysqli_query($connection, $sql);

        if (mysqli_num_rows($req) > 0) {
            echo("Email or User already exist!");
        } else {
            if(!(empty($photo))){
                $client = "INSERT INTO users (Name_User, Email_User, password_user,Photo) VALUES ('$namelogin', '$email', '$password','./images/Icones/$photo')";
                $photo = './images/Icones/'.$photo;
                $passwordlogin=$password;
            }
            else{
                $client = "INSERT INTO users (Name_User, Email_User, password_user,Photo) VALUES ('$namelogin', '$email', '$password','./images/Icones/person_icon.png')";
                $photo = './images/Icones/person_icon.png';
                $passwordlogin=$password;
                
            }
            $query = mysqli_query($connection, $client) or die('Erreur SQL !' . $client . '<br>' . mysqli_error($connection));

            if ($query) {
                
                $_SESSION["namelogin"] = $namelogin;
                $_SESSION["email"] = $email;
                $_SESSION["passwordlogin"] = $passwordlogin;
                $_SESSION["photo"]=$photo;
                if(strtoupper($_SESSION["passwordlogin"]=='ADMIN')){
                    $_SESSION["signup"]="ok admin";
                header("Location: dashboardadmin.php");
                    
                }
                else{
                    $_SESSION["signup"]="ok client";
                    header("Location: index.php");
                }
                
                exit();
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
                echo "<script>window.location.href ='index.php'</script>";
                exit();
            }
        }
    }
}

?>