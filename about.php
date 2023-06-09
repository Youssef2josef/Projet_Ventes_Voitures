<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="shortcut icon" href="./images/Icones/h_icon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <script src="script.js"></script>

    <script src="./sweetalert2@11.js"></script>
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
            <a href="./about.php">About</a>
        </nav>
        <div id="login-btn">
            <button class="btn" id="loginbtn">login</button>
            <button class="btn" id="signupbtn">sign up</button>

            <div class="user" id="user">
                <div class="user-container">
                    <i class="far fa-user"></i>
                    <h1 id="username">
                        <?php
                        echo$_SESSION['namelogin']
                        ?>
                    </h1>
                    <a href="./logout.php"> <button class="btn" id="logoutbtn">log out</button></a>
                </div>
            </div>
            <i class="far fa-user"></i>
        </div>
        <div class="modal" id="login-modal">
            <div class="modal-content" id="modal-content">
                <span class="close" id="close-modal">&times;</span>
                <form method="post" name="login" action="./login.php" id="login-form">
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
        <script>
        var login = document.getElementById("loginbtn");
        var lform = document.getElementById("login-form");

        var signup = document.getElementById("signupbtn");
        var sform = document.getElementById("signup-form");



        var modal = document.querySelector(".modal");
        var modalC = document.querySelector(".modal-content");
        var close = document.getElementById("close-modal");
        var i = document.getElementById("i");

        var closeNav = document.getElementById("close-navbar");

        login.onclick = function() {
            lform.style.display = "block";
            sform.style.display = "none";
            modal.style.display = "block";
        }
        signup.onclick = function() {
            sform.style.display = "block";
            lform.style.display = "none";
            modal.style.display = "block";
        }

        close.onclick = function() {
            modal.style.display = "none";

        }
        window.onclick = function(event) {
            if (event.target == modalC) {
                modal.style.display = "none";
            }
        }
        </script>
    </header>
    <!--<header class="header">
        <a href="./index.php" class="logo"><span>Kar</span>hebti.tn</a>
        <nav class="navbar">
            <span class="close" id="close-navbar">&times;</span>
            <a href="#home">home</a>
            <a href="#vehicules">Vehicules</a>
            <a href="#featured">Feature</a>
            <a href="#contact">contact</a>
            <a href="" id="loginbtn" class="login-navbar-backup">login</a>
            <a href="" id="signupbtn" class="login-navbar-backup">signup</a>

            <a href="./logout.php" id="loginbtn" class="logout-navbar-backup">logout</a>

        </nav>
        <div class="nav-btns">
            <div class="search-bar">
                <form name="search" class="search-form">
                    <input type="text" class="input" name="txt" onmouseout="this.value = ''; this.blur();">
                </form>
                <i class="fas fa-search"></i>

            </div>
            <div id="login-btn">
                <button class="btn" id="loginbtn">login</button>
                <button class="btn" id="signupbtn">sign up</button>

                <div class="user" id="user">
                    <div class="user-container">
                        <i class="far fa-user"></i>
                        <h1 id="username">
                            
                        </h1>
                        <a href="./logout.php"> <button class="btn" id="logoutbtn">log out</button></a>
                    </div>
                </div>
                <i class="far fa-user"></i>
            </div>
            <div class="modal" id="login-modal">
                <div class="modal-content" id="modal-content">
                    <span class="close">&times;</span>
                    <form method="post" name="login" action="./login.php" id="login-form">
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
            <script src="script.js"></script>
            </header> -->


    <section style="background-color:bisque" class="featured" id="featured">
        <h1 class="heading">featured <span>brands</span></h1>
        <div class="card-container">
            <div class="card">
                <a href="#">
                    <div class="card-background">
                        <img src="images/categ/audi.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">audi</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <div class="card-background">
                        <img src="images/categ/porsche.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">porsche</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <div class="card-background">
                        <img src="images/categ/mercedes.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">mercedes</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <div class="card-background">
                        <img src="images/categ/bmw.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">bmw</span></h3>
                    </div>
                </a>
            </div>
    </section>
    <section class="featured" id="teams">
        <h1 class="heading">Marque Voiture <span>Le plus succée en tunisie 2022</span></h1>

        <div class="card-container">
            <a href="./magazine/marque_succes.php">
                <img width=100% height=100% src="./images/voitures/Succés.png" alt="">
            </a>
        </div>
    </section>

    <section style="background-color:bisque" class="contact" id="contact">
        <h1 class="heading">contact us</h1>
        <div class="row">
            <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d949.0553004815454!2d10.187972064003718!3d36.86094189027958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e2cb4b0ecda8a3%3A0xc561ba5428c31de3!2sInstitut%20Sup%C3%A9rieur%20d&#39;Informatique%20(ISI)!5e0!3m2!1sen!2stn!4v1669927725014!5m2!1sen!2stn"
                allowfullscreen="" loading="lazy"></iframe>
            <form name="Message_form" method="post" action="">
                <h3>get in touch</h3>
                <input type="text" name="U_Name" placeholder="name" class="box" required>
                <input type="email" name="User_Email" placeholder="email" class="box" required>
                <input type="number" name="User_Number" placeholder="number" class="box">
                <textarea placeholder="message: max 1000 lettres" name="Message_Contenu" cols="30" rows="10"
                    class="box"></textarea>
                <input type="submit" name="bouton_message" value="send message" class="btn">
            </form>
            <?php

// Connexion à MySQL
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if (isset($_POST['bouton_message'])) { // Autre contrôle pour vérifier si la variable $_POST['bouton'] est bien définie
        $name = $_POST['U_Name'];
        $email = $_POST['User_Email'];
        $number = $_POST['User_Number'];
        $message = $_POST['Message_Contenu'];
        

        
            $m = "INSERT INTO messages (U_Name, User_Email, User_Number,Message_Contenu) VALUES ('$name', '$email', '$number','$message')";
            $query = mysqli_query($connection, $m) or die('Erreur SQL !' . $m . '<br>' . mysqli_error($connection));
            if ($query) {
                
                echo "<script>
                Swal.fire({
                    title: 'Well Done!',
                    text: 'Your message has been sent! we will contact you soon',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3205d1',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
              </script>";
                
                exit();
            } else {
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
                echo "<script>window.location.href ='index.php'</script>";
                exit();
            }
        }
    }


?>
        </div>
    </section>
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


<?php 
                if(!empty($_SESSION['namelogin'])){
                    echo '<script>
                    var user=document.getElementById("user");
                    user.style.display="block";
                    login.style.display="none";
                    signup.style.display="none";</script>';   
                }
                if(!empty($_SESSION['login'])){
                    if($_SESSION['login'] = "Vous etes connecte cher client"){echo "<script>
                        Swal.fire({
                            title: 'Connected!',
                            text: 'Bienvenue! vous etes connecté',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3205d1',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php';
                            }
                        });
                      </script>";}
                    elseif ($_SESSION['login'] ="Pas d'utilisateur") { 
                            echo "<script>
                                Swal.fire({
                                    title: 'Echec!',
                                    text: 'Email ou Mot de Passe Eronnée',
                                    icon: 'warning',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3205d1',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = 'index.php';
                                    }
                                });
                              </script>";
                }elseif($_SESSION['login'] ="Un champ au min est vide"){echo "<script>
                    Swal.fire({
                        title: 'Echec!',
                        text: 'Un champ au min est vide',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3205d1',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php';
                        }
                    });
                  </script>";}
            }
                unset($_SESSION['login']);
?>

</html>