<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page admin</title>
    <link rel="shortcut icon" href="./images/Icones/a_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="./sweetalert2@11.js"></script>
    <script src="./script.js"></script>
    <style>
    body {
        background-color: #f5f5f9;

    }

    h2.sous-titre-gal {
        font-size: 1.7rem;
        font-family: 'Poppins', Times, serif;
        text-transform: uppercase;
        color: #666;
    }

    .modele-similaire {
        margin: 0 auto;
        width: 75%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        height: auto;
    }



    .modele-similaire .Traitement img {
        margin: 25px 0;
        width: 85%;
        height: auto;
        opacity: 0.3;
        transition: opacity .7s;
    }

    .modele-similaire .Traitement img:hover {

        opacity: 0.3;
    }


    h1.voiture {
        color: black;
    }

    h1.client {
        color: wheat;

    }

    .Traitement-img {
        transform: opacity;
    }

    .Traitement-img:hover {
        opacity: 0.5;
    }
    </style>
</head>

<body>
    <header class="header">
        <a href="./index.php" class="logo"><span>Kar</span>hebti.tn</a>
        <nav class="navbar">
            <span class="close" id="close-navbar">&times;</span>
            <a href="./index.php#home">home</a>
            <a href="./index.php#vehicules">vehicules</a>
            <a href="./index.php#featured">featured</a>
            <a href="./index.php#contact">contact</a>

            <a id="loginbtn-backup" class="login-navbar-backup" style="cursor:pointer; background:none;">login</a>
            <a id="signupbtn-backup" class="login-navbar-backup" style="cursor:pointer; background:none;">signup</a>
            <a href="./logout.php" id="logoutbtn" class="logout-navbar-backup">
                log out
            </a>
        </nav>
        <div id="login-btn">
            <button class="btn" id="loginbtn">login</button>
            <button class="btn" id="signupbtn">sign up</button>
            <i class="fa fa-user-circle" id="i"></i>


            <div class="user" id="user" style="display:none;">
                <div class="user-container">
                    <h1 id="username">
                        <?php
                        echo$_SESSION['namelogin'];?>
                    </h1>
                    <img src="<?php echo$_SESSION['photo'];?>" alt="Photo Profil"
                        style="width:70px;height:50px;cursor:pointer;border-radius:50%;">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    <a href="./logout.php"><button class="btn" id="logoutbtn">log out</button></a>
                </div>
            </div>
        </div>
        <div class="modal" id="login-modal">
            <div class="modal-content" id="modal-content">
                <span class="close" id="close-modal">&times;</span>
                <form method="post" name="login" action="./loginadmin.php" id="login-form">
                    <h3><span class="highlight-modal">login</span></h3>
                    <input type="email" name="email" placeholder="email" class="box">
                    <input type="password" name="password" placeholder="password" class="box">
                    <input type="submit" name="bouton_login" value="login now" class="btn">
                </form>

                <form method="post" name="signup" action="./signup.php" id="signup-form"
                    onsubmit="return validateForm()">
                    <h3><span class="highlight-modal">sign up</span></h3>
                    <input type="text" name="name" id="name" placeholder="name" class="box">
                    <small class="error" id="errorf"></small>

                    <input type="email" name="email" id="email" placeholder="email" class="box">
                    <small class="error" id="errore"></small>

                    <input type="password" name="password" placeholder="password" class="box">
                    <small class="error" id="errorpa"></small>

                    <input type="password" name="confirmp" placeholder="confirm password" class="box">
                    <small class="error" id="errorp"></small>

                    <input type="submit" name="bouton" value="sign up" class="btn">
                </form>


            </div>
        </div>
        <script src="./script.js"></script>
    </header>
    <div class="gal">
        <h3>
            PAGE ADMINISTRATION <br>
            <h2 class="sous-titre-gal">
                Veuillez saisir un option pour continuer
            </h2>
        </h3>
    </div>
    <div class="modele-similaire">
        <div class="sous-modele-similaire">
            <h1 class="voiture">
                Gestion Voitures
            </h1>
            <figure>
                <div class="Traitement">
                    <img src="./images/Icones/voiture_icon.jpg" alt="" style="opacity:1;" class="Traitement-img">
                </div>
                <figcaption style="font-style: italic;">
                    <a style="font-size:3rem;" href="detailVoiture.php">View More</a>
                </figcaption>
            </figure>
        </div>
        <div class="sous-modele-similaire">
            <h1 class="voiture">
                <spann style="color:red"> Gestion Messages</span>
            </h1>
            <figure>
                <div class="Traitement">
                    <img src="./images/Icones/msg_icon.png" alt="" style="opacity:0.2;" class="Traitement-img">
                </div>
                <figcaption style="font-style: italic;">
                    <a style="font-size:3rem;" href="detailMessage.php">View More</a>
                </figcaption>
            </figure>
        </div>
        <div class="sous-modele-similaire">
            <h1 class="client">
                <span style="color:blueviolet">Gestion Client</span>
            </h1>
            <figure>
                <div class="Traitement">
                    <img src=" ./images/client.png" alt="" style="opacity:0.7;" class="Traitement-img">
                </div>
                <figcaption>
                    <a style="font-size:3rem;" href="detailUser.php">View More</a>
                </figcaption>
            </figure>
        </div>

    </div>


</body>


</html>
<?php 
                if(!empty($_SESSION["namelogin"])){
                    if($_SESSION['passwordlogin']=="ADMIN"){
                        echo '<script>
                    var user=document.getElementById("user");
                    var login_backup=document.getElementById("loginbtn-backup");
                    var signup_backup=document.getElementById("signupbtn-backup");


                    var circle = document.querySelector(".fa-user-circle");
                    var ellipsis = document.querySelector(".fa-ellipsis-h");
                    ellipsis.onclick= function(){
                        navElements.style.marginLeft="0px";
                    }
                    user.style.display="block";
                    login.style.display="none";
                    signup.style.display="none";
                    circle.style.display="none";
                    login_backup.style.display="none";
                    signup_backup.style.display="none";
                    </script>';
                    }
                    
                
                }else{
                    echo'<script>
                    var logout=document.getElementById("logoutbtn");
                    logout.style.display="none";</script>';
                };
                if(!empty($_SESSION['login'])){
                        if($_SESSION["login"]=="Vous etes connecte en tant que administrateur"){
                            echo"<script>
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Weclome! vous etes l'administrateur',
                            showConfirmButton: false,
                            timer: 2500
                        })
                        </script>";
                        }
                        elseif($_SESSION["login"]=="Pas d'utilisateur"){
                            echo"<script>
                            Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Données fausses ! entrez à nouveau',
                            showConfirmButton: false,
                            timer: 2500
                        })
                        </script>";
                            
                        }else{echo"<script>
                            Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Un champ au min est vide ! entrez à nouveau',
                            showConfirmButton: false,
                            timer: 2500
                        })
                        </script>";}
                    }
                    if(!empty($_SESSION['logout'])){
                        if($_SESSION['logout']=="ok"){
                            echo"<script>
                            Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Vous etes déconnecté',
                            showConfirmButton: false,
                            timer: 2500
                        })
                        </script>";
                        session_unset();
                        session_destroy();
                        }
                    }
                unset($_SESSION["login"]);
                unset($_SESSION["logout"]);
                
                        
?>