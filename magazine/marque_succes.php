<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    $voitures="SELECT * from voitures where Marque='Mercedes' OR Marque='Porsche' ";
    $exec_requete = mysqli_query($connection,$voitures);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hyundai</title>
    <link rel="shortcut icon" href="../images/Icones/hyndai_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
    <script src="../sweetalert2@11.js"></script>
    <style>
    .body-img {
        background-color: whitesmoke;
        padding-bottom: 35px;
    }

    .div-voiture-selected {
        width: 75%;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
    }

    .voiture-selected {
        margin-top: 20px;
        width: 100%;
        opacity: 0.3;
        transform: 0.5s opacity;
    }

    .voiture-selected:hover {
        opacity: 1;
    }

    .contenu-voiture-selected {
        width: 75%;
        margin: 0 auto;
        justify-content: left;
        display: flex;
    }

    .contenu-voiture-selected span {
        width: 20px;
        height: 20px;
    }

    .text-contenu {
        font-size: 1.5rem;
        color: burlywood;
    }
    </style>
</head>

<body>
    <div class="body-img">
        <header class="header">
            <a href="../index.php" class="logo"><span>Kar</span>hebti.tn</a>
            <nav class="navbar">
                <span class="close" id="close-navbar">&times;</span>
                <a href="../index.php">home</a>
                <a href="../index.php#vehicules">vehicules</a>
                <a href="../index.php#featured">featured</a>
                <a href="../index.php#contact">contact</a>
            </nav>
            <div id="login-btn">
                <button class="btn" id="loginbtn">login</button>
                <button class="btn" id="signupbtn">sign up</button>

                <div class="user" id="user" style="display:none;">
                    <div class="user-container">
                        <i class="far fa-user"></i>
                        <h1 id="username">
                            <?php
                        echo$_SESSION['namelogin']
                        ?>
                        </h1>
                        <a href="../logout.php"> <button class="btn" id="logoutbtn">log out</button></a>
                    </div>
                </div>
                <i class="far fa-user"></i>
            </div>
            <div class="modal" id="login-modal">
                <div class="modal-content" id="modal-content">
                    <span class="close">&times;</span>
                    <form method="post" name="login" action="../login.php" id="login-form">
                        <h3><span class="highlight-modal">login</span></h3>
                        <input type="email" name="email" placeholder="email" class="box">
                        <input type="password" name="password" placeholder="password" class="box">
                        <input type="submit" name="bouton_login" value="login now" class="btn">
                    </form>


                    <form method="post" name="signup" action="../signup.php" id="signup-form"
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
            <script src="../script.js"></script>
        </header>
        <div class="gal">
            <h3>
                HYUNDAI: LA MARQUE LA PLUS VENDUE EN TUNISIE DEPUIS 2020
            </h3>

        </div>
        <div class="div-voiture-selected">
            <img src="../images/voitures/Succés.png" alt="" class="voiture-selected">
        </div>
        <div class="contenu-voiture-selected">
            <span> &#128197;</span>
            <?php
        $date = date("Y-m-d");
        echo  "<h1 class='text-contenu'>".$date."</h1>";
        ?>
        </div>
        <div style="color:black; font-size:2rem; width: 70%;
        margin: 10px auto; padding:10px ;
        justify-content: center;align-items:center; text-align: justify; text-justify: inter-word;">
            <h1></h1>
            Alpha Hyundai Motor, distributeur officiel de la firme automobile sud-coréenne Hyundai en Tunisie, confirme
            sa
            position de leader durant la période allant de Janvier 2020 à Mars 2023 et annonce la vente de 19 535
            unités,
            faisant ainsi de la marque coréenne la marque la plus vendue sur le marché automobile tunisien au cours de
            cette
            période.
        </div>
        <div style=" font-size:2rem; width: 75%;
        margin: 10px auto; padding:10px ;
        justify-content: left;  text-align: justify;  text-justify: none;">
            En tant que leader du marché automobile en 2022 et aussi au premier trimestre 2023, Hyundai est fière de
            répondre aux attentes de ses clients grâce à sa gamme diversifiée de véhicules et à son service client de
            qualité. L’engagement de Hyundai envers ses clients est illustré par plusieurs récompenses dont "service
            client
            de l'année 2023" pour la deuxième année consécutive et également « l’entreprise qui respecte les droits des
            consommateurs ».<br> Avec 20 agences officielles Hyundai réparties sur tout le territoire tunisien, la
            marque reste toujours aux côtés de ses clients pour répondre à toutes leurs demandes et les aider à choisir
            le véhicule qui correspond le mieux à leurs besoins. </div>

        <div style="font-size:2rem; width: 75%;
        margin: 0 auto;
        justify-content: left;">
            Le volume de vente des différents modèles Hyundai au cours de cette période a été plus que remarquable.
            En
            effet, la i10 5 CV a enregistré 7 148 immatriculations, suivie de près par la i10 populaire avec 4 106
            immatriculations, la i10 Sedan avec 2 116 immatriculations et la i20 avec 4 687 immatriculations.
        </div>
        <div style="font-size:2rem; width: 75%;
        margin: 0 auto 25px auto; padding-bottom:20px;
        justify-content: left;">
            Le dévouement inébranlable de Hyundai à fournir un large éventail de véhicules adaptés aux désirs et
            exigences
            des consommateurs se reflète dans ces chiffres. <br>
            Avec un tel succès, Hyundai Tunisie continue à être un choix
            incontournable des tunisiennes et des
            tunisiens.
        </div>

    </div>
    <footer class="footer" id="footer">

        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="#home"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="#vehicules"> <i class="fas fa-arrow-right"></i> vehicles </a>
                <a href="#contact"> <i class="fas fa-arrow-right"></i> contact </a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
                <a href="#"> <i class="fas fa-envelope"></i> l2cs02@gmail.com </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> ariana, tunisia - 111111 </a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            </div>

        </div>

        <div class="credit"> Created By Youssef Jouini </div>

    </footer>
</body>

</html>
<?php 
                if(!empty($_SESSION["namelogin"])){
                    echo '<script>
                    var user=document.getElementById("user");
                    user.style.display="block";
                    login.style.display="none";
                    signup.style.display="none";</script>';
                    }
?>