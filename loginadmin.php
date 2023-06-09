<?php
session_start();

// Connexion à MySQL
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} 
else {
        if (isset($_POST['bouton_login'])) { // Autre contrôle pour vérifier si la variable $_POST['bouton'] est bien définie
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email !== "" && $password !== "")
            {
        $requete = "SELECT count(*) FROM users where 
        Email_User = '".$email."' and password_user = '".$password."' ";
        $exec_requete = mysqli_query($connection,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
                {
        $user = "SELECT * FROM users where 
        Email_User = '".$email."' and password_user = '".$password."' ";   
        $exec_requete = mysqli_query($connection,$user);
        $reponse = mysqli_fetch_array($exec_requete);
        $namelogin = $reponse['Name_User'];
        $emaillogin = $reponse['Email_User'];
        $passwordlogin = $reponse['password_user'];
        $photo = $reponse['Photo'];

        
        $_SESSION['namelogin'] = $namelogin;
        $_SESSION['emaillogin']=$emaillogin;
        $_SESSION['passwordlogin']=$passwordlogin;
        $_SESSION['photo']=$photo;

        if(strtoupper($_SESSION["passwordlogin"]=='ADMIN')){
            $_SESSION['login'] = "Vous etes connecte en tant que administrateur";
            header("Location: dashboardadmin.php");       
        }
        else{
            $_SESSION['login']="Vous etes connecte cher Client";
            header("Location: index.php");
        }
        
    }
        else{
            $_SESSION['login'] = "Pas d'utilisateur";
            header("Location: dashboardadmin.php");
            

            // echo("<script>Swal.fire({
            //     icon: 'error',
            //     title: 'Oops...',
            //     text: 'Pas d'utilisateur !',
            //   })</script>");
            }
            
        }else{$_SESSION['login'] = "Un champ au min est vide";
            header("Location: dashboardadmin.php");
            
        }
    }}
       
        


?>