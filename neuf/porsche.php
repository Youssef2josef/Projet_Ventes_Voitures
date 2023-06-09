<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    $audis="SELECT * from voitures where Marque = 'Porsche' order by Prix";
    $requete = mysqli_query($connection,$audis);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porsche</title>
    <link rel="shortcut icon" href="../images/categ/porsche.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link rel="stylesheet" href="../style.css">


    <script src="../script.js"></script>

    <script src="../sweetalert2@11.js"></script>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Besley", serif;

    }

    .logo {
        display: flex;
        width: 15%;
        height: auto;
        align-items: center;
        position: relative;
        text-align: center;
    }

    .logo img {
        width: 70%;
        height: 100px;
        border-radius: 10%;
    }

    .user .user-container img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: contain;
    }

    .avant-home {
        padding: 4rem 0 0;
    }

    .container {
        width: 100%;
        height: 95vh;
        position: relative;
        overflow: hidden;
    }

    .slides {
        display: flex;
        height: 100%;
    }

    .slide {
        min-width: 100%;
        position: relative;
    }

    .slide img {
        width: 100%;
        height: 100%;
    }

    .slide-content p {
        font-family: "Mulish", sans-serif;
        text-transform: capitalize;

    }

    .slide-controls {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #next-btn,
    #prev-btn {
        cursor: pointer;
        background: transparent;
        font-size: 30px;
        border: none;
        padding: 10px;
        color: white;
    }

    #next-btn:focus,
    #prev-btn:focus {
        outline: none;
    }

    .slide-content {
        position: absolute;
        top: 40%;
        left: 50px;
        transform: translateY(-50%);
        font-size: 5rem;
        text-transform: uppercase;
        color: var(--black);
    }

    .feature {
        padding: 9%;
        background-image: url('../images/voitures/background_porsche_6.jpg');
        background-size: 100% 100%;
        background-position: cover;
        width: 100%;
        height: auto;
    }

    .feature .container-feature {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
    }

    .container-feature h6 {
        text-align: center;
        margin: 10px;
        font-size: 5rem;
        color: black;
    }

    .feature .container-modele {
        width: 90%;
        height: auto;
        margin: 0 auto;
        padding: 3%;
        opacity: 0.1;
        transition: opacity 0.7s;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        background-color: rgba(150, 150, 150, .8);
        justify-content: space-between;
    }

    .feature .container-modele:hover {
        opacity: 1;
    }

    .FeatureSlider {
        Width: 33.3%;
        padding: 1rem;
        padding-bottom: 4rem;
    }

    .swapper-wrapper {
        min-height: auto;
    }

    .FeatureSlider .box {
        padding: 1rem;
        text-align: center;
        border: var(--border);
        border-radius: 0.5rem;
        box-shadow: var(--box_shadow);
    }

    .feature img {
        height: 13rem;
    }

    .feature .box:hover img {
        transform: scale(1.08);
    }

    .container-modele h3 {
        font-size: 1.5rem;
        color: #984860;
    }

    .container-modele h3.sous-modele {
        font-size: 1rem;
    }

    @media screen and (max-width: 768px) {
        html {
            font-size: 55%;
        }

        .avant-home {
            width: 100%;
            height: 50vh;
        }

        .container {
            width: 100%;
            height: 100%;
        }

        .slide-content {
            font-size: large;
        }

        .feature {
            padding: 9% 0;
        }

        .container-feature h6 {
            text-align: center;
            margin: 10px;
            font-size: 3rem;
            color: black;
        }

        .container-modele {
            display: flex;
            flex: 0 0 50%;
        }

        .FeatureSlider {
            width: 50%;
            padding: 0;
            padding-bottom: 0;
        }

        .FeatureSlider img {
            width: 60%;
        }
    }

    @media screen and (max-width: 450px) {
        html {
            font-size: 55%;
        }

        .user .user-container i {
            font-size: 1rem;
        }

        .user .user-container img {
            height: 25px;
            width: 25px;
        }

        .avant-home {
            width: 100%;
            height: 50vh;
        }

        .feature {
            background-image: url('../images/voitures/background_porsche_5.jpg');
        }

        .container {
            width: 100%;
            height: 100%;
        }

        .slide-content {
            font-size: 1.5rem;
        }

        .container-feature h6 {
            text-align: center;
            margin: 10px;
            font-size: 3rem;
            color: antiquewhite;

        }

        .container-modele {
            display: flex;
            flex: 0 0 50%;
        }

        .FeatureSlider {
            width: 50%;
        }

        .FeatureSlider img {
            width: 60%;
        }

        .swiper-slide.box {
            width: 90%;
            margin: 10px;
        }

        .content {
            text-align: center;
        }

        .content h3 {
            font-size: 1rem;
        }

        .content h3.sous-modele {
            font-size: 0.6rem;
        }

        .content h1 {
            font-size: 1rem;
        }
    }

    @media screen and (max-width: 300px) {
        html {
            font-size: 40%;
        }

        .avant-home {
            width: 100%;
            height: 50vh;
        }

        .container {
            width: 100%;
            height: 100%;
        }



        .slide-content h1 {
            font-size: 2rem;
        }

        .container-feature h6 {
            text-align: center;
            margin: 10px;
            font-size: 3rem;
            color: antiquewhite;

        }

        .container-modele {
            display: flex;
            flex: 0 0 100%;
        }

        .feature {
            background-image: url('../images/voitures/background_porsche_5.jpg');
        }

        .FeatureSlider {
            width: 100%;
        }

        .FeatureSlider img {
            width: 80%;
        }

        .swiper-slide.box {
            width: 90%;
            margin: 10px;
        }

        .content {
            text-align: center;
        }

        .content h3 {
            font-size: 1.5rem;
        }

        .content h3.sous-modele {
            font-size: 1rem;
        }

        .content h1 {
            font-size: 2rem;
        }
    }
    </style>
</head>

<body>
    <header class="header" style="max-height:70px;">

        <a href="../index.php" class="logo"><span>Kar</span>hebti.tn</a>



        <nav class="navbar">
            <span class="close" id="close-navbar">&times;</span>
            <a href="../index.php#home">home</a>
            <a href="../index.php#vehicles">vehicles</a>
            <a href="../index.php#featured">featured</a>
            <a href="../index.php#contact">contact</a>

            <a id="loginbtn-backup" class="login-navbar-backup" style="cursor:pointer; background:none;">login</a>
            <a id="signupbtn-backup" class="login-navbar-backup" style="cursor:pointer; background:none;">signup</a>
            <a href="../logout.php" id="logoutbtn" class="logout-navbar-backup">
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
                    <img src="../<?php echo$_SESSION['photo'];?>" alt="Photo Profil">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    <a href="../logout.php"><button class="btn" id="logoutbtn">log out</button></a>
                    </img>
                </div>
            </div>
            <div class="modal" id="login-modal">
                <div class="modal-content" id="modal-content">
                    <span class="close" id="close-modal">&times;</span>
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

                        <input type="file" name="photo" id="email" placeholder="email" class="box">


                        <input type="submit" name="bouton" value="sign up" class="btn">
                    </form>


                </div>
            </div>
            <script src="../script.js"></script>
    </header>
    <section class="avant-home">
        <div class="container">
            <div class="slides">
                <div class="slide" style="background-image: url('../images/voitures/background_porsche_1.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position: cover;">
                    <div class="slide-content" style="color: red;">
                        <h1>This is Heading</h1>
                    </div>
                </div>
                <div class="slide" style="background-image: url('../images/voitures/background_porsche_2.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position: cover;">
                    <div class="slide-content" style="color: white;">
                        <h1>German luxury and sports cars</h1>
                    </div>
                </div>
                <div class="slide" style="background-image: url('../images/voitures/background_porsche_3.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position: cover;">
                    <div class="slide-content" style="color: rgba(50,250,250,1);">
                        <h1>Porsche <br>Panamera</h1>
                    </div>
                </div>
                <div class="slide" style="background-image: url('../images/voitures/background_porsche_4.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-position: cover;">
                    <div class="slide-content" style="color: rgba(50,250,250,1) ; top:30%; font: size 4rem;">
                        <h1>Porsche <br>Macan</h1>
                    </div>
                </div>
            </div>
            <div class="slide-controls">
                <button id="prev-btn">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="next-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
    <script>
    const slideContainer = document.querySelector('.container');
    const slide = document.querySelector('.slides');
    const nextBtn = document.getElementById('next-btn');
    const prevBtn = document.getElementById('prev-btn');
    const interval = 2000;

    let slides = document.querySelectorAll('.slide');
    let index = 1;
    let slideId;

    const firstClone = slides[0].cloneNode(true);
    const lastClone = slides[slides.length - 1].cloneNode(true);

    firstClone.id = 'first-clone';
    lastClone.id = 'last-clone';

    slide.append(firstClone);
    slide.prepend(lastClone);

    let slideWidth = slides[index].clientWidth;

    const setSlideWidth = () => {
        slideWidth = slides[index].clientWidth;
        slide.style.transform = `translateX(${-slideWidth * index}px)`;
    };

    const startSlide = () => {
        slideId = setInterval(() => {
            moveToNextSlide();
        }, interval);
    };

    const getSlides = () => document.querySelectorAll('.slide');

    slide.addEventListener('transitionend', () => {
        slides = getSlides();
        if (slides[index].id === firstClone.id) {
            slide.style.transition = 'none';
            index = 1;
            slide.style.transform = `translateX(${-slideWidth * index}px)`;
        }

        if (slides[index].id === lastClone.id) {
            slide.style.transition = 'none';
            index = slides.length - 2;
            slide.style.transform = `translateX(${-slideWidth * index}px)`;
        }
    });

    const moveToNextSlide = () => {
        slides = getSlides();
        if (index >= slides.length - 1) return;
        index++;
        slide.style.transition = '.7s ease-out';
        slide.style.transform = `translateX(${-slideWidth * index}px)`;
    };

    const moveToPreviousSlide = () => {
        if (index <= 0) return;
        index--;
        slide.style.transition = '.7s ease-out';
        slide.style.transform = `translateX(${-slideWidth * index}px)`;
    };

    slideContainer.addEventListener('mouseenter', () => {
        clearInterval(slideId);
    });

    slideContainer.addEventListener('mouseleave', startSlide);
    nextBtn.addEventListener('click', moveToNextSlide);
    prevBtn.addEventListener('click', moveToPreviousSlide);

    window.addEventListener('resize', () => {
        setSlideWidth();
    });

    setSlideWidth();
    startSlide();
    </script>
    <section class="feature">
        <div class="container-feature">
            <h6>List Of Models</h6>

            <div class="container-modele">

                <?php
            if(mysqli_num_rows($requete)>0){
                while($row=mysqli_fetch_assoc($requete)){
            echo'
            <div class="swiper FeatureSlider">
            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <img src="../'.$row["Photo_1"].'" alt="">

                    <div class="content">
                        <h3>'.$row["NomVoiture"].'</h3>
                        <h3 class="sous-modele">'.$row["Sous_modele"].'</h3>

                        <div class="stars">
                            <i class="fas fa-star" style="color:red;"></i>
                            <i class="fas fa-star" style="color:red;"></i>
                            <i class="fas fa-star" style="color:red;"></i>
                            <i class="fas fa-star" style="color:red;"></i>
                            <i class="fas fa-star" style="color:red;"></i>
                        </div>
                        <h1 class="price">'.$row["Prix"].' DT</h1>
                        <a href="../car.php?id='.$row["IdV"].'" class="btn">More...</a>
                    </div>
                </div>
            </div>
            </div>';}}
            ?>

            </div>
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
                <a href="#vehicles"> <i class="fas fa-arrow-right"></i> vehicles </a>
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
            <div class="box">
                <h3>more info</h3>
                <a href="./index.php#vehicles"><i class="fa fa-car" style="font-size:1.5rem;"></i>brand lists</a>
            </div>
        </div>
        <div class="credit">created by youssef jouini</div>
    </footer>
</body>
<?php 
                if(!empty($_SESSION['namelogin'])){
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
                }else{
                    echo'<script>
                    var logout=document.getElementById("logoutbtn");
                    logout.style.display="none";</script>';
                }
                if(!empty($_SESSION['login'])){
                    if($_SESSION['login']=="Vous etes connecte en tant que administrateur"){
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
                    elseif($_SESSION['login']=="Vous etes connecte cher Client"){
                        echo"<script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Bienvenue cher<br>".$_SESSION["namelogin"]." ! ',
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
                if(!empty($_SESSION['login'])){
                    if($_SESSION["signup"]="ok admin"){
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
                    elseif($_SESSION["signup"]="ok client"){
                        echo"<script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Bienvenue cher<br>".$_SESSION["namelogin"]." ! ',
                        showConfirmButton: false,
                        timer: 2500
                    })
                    </script>";
                    }
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
                unset($_SESSION['login']);
                unset($_SESSION['logout']);
                unset($_SESSION['signup']);
?>

</html>