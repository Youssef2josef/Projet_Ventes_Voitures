<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    //$user_id=$_SESSION['namelogin'];
    $voitures="SELECT * from voitures where Prix >= 700000 order by Prix DESC";
    $mercedes="SELECT * from voitures where NomVoiture = 'MERCEDES-GLE-COUPÉ'";
    //$user="SELECT * from users where Name_User=$user_id";
    $exec_requete = mysqli_query($connection,$voitures);
    $requete = mysqli_query($connection,$mercedes);
    //$requete_user = mysqli_query($connection,$user);
    $row_m=mysqli_fetch_assoc($requete);
    $bon_voiture="SELECT * from voitures where Voiture_Mois=1";
    $exec_requete2 = mysqli_query($connection,$bon_voiture);
    
    // while($row_u=mysqli_fetch_assoc($requete_user)){
        
    // }; 

    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="./images/Icones/h_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="./style.css">
    <script src="script.js"></script>
    <script src="./sweetalert2@11.js"></script>


    <style>
    html {
        overflow-x: hidden;
    }

    * {
        font-family: "Besley", serif;

    }

    .user .user-container img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: contain;
    }

    .avant-home {
        height: 100vh;
        width: 100vw;
        margin: 0 0 20px 0;
        background-image: url('./images/Car_Animation_Img/sky.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
        overflow-x: hidden;
    }

    .description {
        width: 20%;
        height: 7vh;

        /*position: absolute;
        top: 25%;
        left: 25%;*/
        margin: 15% auto;
        padding: 5px 2px 0;
        border: 1px solid black;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .description:hover {
        border-radius: 50%;
        background-color: #ff7d7d;
        cursor: pointer;
        color: wheat;
    }

    .description p {
        font-family: "Mulish", sans-serif;
        font-size: 2rem;
        font-weight: bold;
    }

    .highway {
        height: 200px;
        width: 1000%;
        display: block;
        background-image: url('./images/Car_Animation_Img/road.jpg');
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1;
        background-repeat: repeat-x;
        animation: highway 5s linear infinite;
    }

    @keyframes highway {

        100% {
            transform: translateX(-3400px);
        }
    }

    .city {
        height: 250px;
        width: 500%;
        display: block;
        background-image: url('./images/Car_Animation_Img/city.png');
        position: absolute;
        bottom: 200px;
        left: 0;
        right: 0;
        z-index: 1;
        background-repeat: repeat-x;
        animation: city 20s linear infinite;
    }

    @keyframes city {

        100% {
            transform: translateX(-1400px);
        }
    }

    .car {
        width: 400px;
        left: 50%;
        bottom: 100px;
        transform: translateX(-50%);
        position: absolute;
        z-index: 2;
    }

    .car img {
        width: 100%;
        animation: car 1s linear infinite;
    }

    @keyframes car {
        100% {
            transform: translateY(-1px);
        }

        50% {
            transform: translateY(1px);
        }

        0% {
            transform: translateY(-1px);
        }
    }

    .wheel {
        left: 50%;
        bottom: 178px;
        transform: translateX(-50%);
        position: absolute;
        z-index: 2;
    }

    .wheel img {
        width: 72px;
        height: 72px;
        animation: wheel 1s linear infinite;
    }

    .back-wheel {
        left: -165px;
        position: absolute;
    }

    .front-wheel {
        left: 80px;
        position: absolute;
    }

    @keyframes wheel {
        100% {
            transform: rotate(360deg);
        }
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

    .agency-name {
        bottom: -10px;
        font-size: 0.5em;
        font-weight: bold;
        text-transform: capitalize;
    }

    .container-1 {
        margin: 0 auto;
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .slides {
        display: flex;
        height: 100%;
    }



    .slide-controls {
        position: absolute;
        top: 50%;
        left: -0.3%;
        transform: translateY(-50%);
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #next-btn,
    #prev-btn {
        cursor: pointer;
        background: black;
        font-size: 30px;
        border: none;
        padding: 10px;
        color: white;
        border-radius: 50%;
    }

    #next-btn:focus,
    #prev-btn:focus {
        outline: none;
    }

    #prev-btn {
        margin-left: 10px;
    }

    .slide-content {
        position: absolute;
        top: 50%;
        left: 50px;
        transform: translateY(-50%);
        font-size: 60px;
        color: white;
    }

    .btn:hover {
        background: #ff6000;
    }

    /* PRODUCTS */
    .product {
        position: relative;
        overflow: hidden;
        padding: 20px;
    }

    .product-category {
        font-family: "Mulish", sans-serif;
        padding: 0 10vw;
        font-size: 30px;
        font-weight: 500;
        margin-bottom: 40px;
        text-transform: capitalize;
    }

    .product-container {
        font-family: "Mulish", sans-serif;
        padding: 0 10vw;
        height: auto;
        display: flex;
        overflow-x: auto;
        overflow-y: none;
        scroll-behavior: smooth;
    }

    .product-container::-webkit-scrollbar {
        display: none;
    }

    .product-card {
        font-family: "Mulish", sans-serif;
        flex: 0 0 55%;
        width: 250px;
        height: auto;
        margin-right: 40px;
    }

    .product-image {
        position: relative;
        width: 100%;
        height: 350px;
        overflow: hidden;
    }

    .product-thumb {
        width: 80%;
        height: 100%;
        margin: 0 auto;
        justify-content: center;
        object-fit: contain;
    }

    .discount-tag {
        font-family: "Mulish", sans-serif;
        position: absolute;
        background: #fff;
        padding: 5px;
        border-radius: 5px;
        color: #ff7d7d;
        right: 10px;
        top: 10px;
        text-transform: capitalize;
        font-size: 1.8rem;
    }

    .card-btn {
        font-family: "Mulish", sans-serif;

        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        padding: 10px;
        width: 90%;
        text-transform: capitalize;
        border: none;
        outline: none;
        background: transparent;
        border-radius: 5px;
        transition: 0.5s;
        cursor: pointer;
        opacity: 0;
    }

    .product-card:hover .card-btn {

        opacity: 1;
    }

    .card-btn:hover {
        color: #fff;
        background-color: transparent;
    }

    .product-info {
        font-family: "Mulish", sans-serif;
        width: 100%;

        height: auto;
        padding-top: 10px;
    }

    .product-brand {
        font-family: "Mulish", sans-serif;
        text-transform: uppercase;

    }

    .product-short-description {
        font-family: "Mulish", sans-serif;
        width: 100%;
        height: 20px;
        line-height: 20px;
        overflow: hidden;
        opacity: 0.5;
        text-transform: capitalize;
        margin: 5px 0;
        font-size: 1.1rem;
    }

    .price {
        font-family: "Mulish", sans-serif;

        font-weight: 900;
        font-size: 1.3rem;
    }

    .actual-price {
        font-family: "Mulish", sans-serif;
        margin-left: 20px;
        opacity: 0.5;
        text-decoration: line-through;
    }

    .pre-btn,
    .nxt-btn {
        border: none;
        width: 10vw;
        height: 100%;
        position: absolute;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, #fff 100%);
        cursor: pointer;
        z-index: 8;
    }

    .pre-btn {
        left: 0;
        transform: rotate(180deg);
    }

    .nxt-btn {
        right: 0;
    }

    .pre-btn img,
    .nxt-btn img {
        opacity: 0.2;
    }

    .pre-btn:hover img,
    .nxt-btn:hover img {
        opacity: 1;
    }

    .collection-container {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 10px;
    }

    .collection {
        position: relative;
    }

    .collection img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .collection p {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
        font-size: 50px;
        text-transform: capitalize;
    }

    .collection:nth-child(3) {
        grid-column: span 2;
        margin-bottom: 10px;
    }



    @media screen and (max-width: 920px) {
        .description {
            width: 30%;
            height: 6%;
        }

        .description p {
            font-size: 2.5rem;
            font-weight: bold;
        }


    }

    @media screen and (max-width: 768px) {
        .description {
            width: 40%;
            height: 5%;
        }

        .description p {
            font-size: 1.9rem;
            font-weight: bold;
        }

        .home {
            padding: 8rem 0;
            clip-path: circle(60% at 50% 50%);
            height: 50vh;
        }

        p span.highlight,
        h1 span.highlight {
            font-size: 1.2rem;
        }



        .home-content {
            position: absolute;
            top: 30%;
            display: flex;
            flex-direction: row;
            width: 90%;
            margin: 0rem;
            justify-content: space-around;
            align-items: center;
        }

        .home-content img {
            display: block;
        }

        .product-card {
            flex: 0 0 50%;
        }

        .container-1 {
            padding: 20px;
        }

        .home-content .details {
            text-align: center;
            width: 50%;
            margin: auto;
            left: 2.5rem;
        }

        .details p {
            font-size: 0.5rem;
        }

        .details h1 {
            font-size: 2rem;
        }

        .home-img {
            display: block;
            margin: auto;
            max-width: 90%;
            height: auto;
        }

        .slide-controls {
            text-align: center;
        }

        #next-btn,
        #prev-btn {
            font-size: medium;
        }

        #prev-btn {
            margin-left: 0px;
        }
    }

    @media screen and (max-width: 450px) {
        /* .user {
            width: 10%;
            position: absolute;
            top: 20%;
            right: 15%;
        } */

        .user .user-container i {
            font-size: 1rem;
        }

        .user .user-container img {
            height: 25px;
            width: 25px;
        }

        .description {
            top: 10%;
            left: 20%;
            position: absolute;
            width: 60%;
            height: 5%;
        }

        .description p {
            font-size: 1.9rem;
            font-weight: bold;
        }

        /*start style road */
        .city {
            bottom: 180px;
            width: 5000%;
        }

        .highway {
            width: 5000%;
            height: 180px;
        }

        .container-1 .slides .slider-1 .btn {
            font-size: 1rem;
        }

        /*start style road */
        /*start style car*/
        .car {
            width: 200px;
            bottom: 80px;
        }

        .wheel img {
            width: 35px;
            height: 35px;
        }

        .wheel {
            bottom: 121px;
        }

        .back-wheel {
            left: -82px;
            position: absolute;
        }

        .front-wheel {
            left: 40px;
            position: absolute;
        }

        p span.highlight,
        h1 span.highlight {
            font-size: 1rem;
        }

        /*end car*/
        .product-card {
            margin-left: 10vmin;
            margin-right: 10vmin;
            flex: 0 0 100%;
            /* Ajustez la valeur en fonction de vos besoins */
        }

        #prev-btn {
            margin-left: 0px;
        }
    }

    @media screen and (max-width: 300px) {
        html {
            font-size: 40%;
        }
    }
    </style>
</head>

<body>
    <header class="header" style="max-height:70px;">

        <a href="./index.php" class="logo"><span>Kar</span>hebti.tn</a>



        <nav class="navbar">
            <span class="close" id="close-navbar">&times;</span>
            <a href="#home">home</a>
            <a href="#vehicles">vehicles</a>
            <a href="#featured">featured</a>
            <a href="#contact">contact</a>

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
                    <img src="<?php echo$_SESSION['photo'];?>" alt="Photo Profil">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    <a href="./logout.php"><button class="btn" id="logoutbtn">log out</button></a>
                    </img>
                </div>
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

                        <input type="file" name="photo" id="email" placeholder="email" class="box">


                        <input type="submit" name="bouton" value="sign up" class="btn">
                    </form>


                </div>
            </div>
            <script src="./script.js"></script>
    </header>
    <section class="avant-home">
        <div class="description">
            <p>for better ride</p>
        </div>
        <div class="highway"></div>
        <div class="city"></div>
        <div class="car">
            <img src="./images/Car_Animation_Img/car.png" alt="">
        </div>
        <div class="wheel">
            <img src="./images/Car_Animation_Img/wheel.png" alt="" class="back-wheel">
            <img src="./images/Car_Animation_Img/wheel.png" alt="" class="front-wheel">
        </div>
    </section>
    <section class="home" id="home">
        <div class="container-1">
            <div class="slides">
                <div class="slider-1">
                    <div class="home-bg"></div>
                    <div class="home-content">
                        <div class="details">
                            <h1><span class="highlight">Choose your car</span></h1>
                            <p><span class=" highlight">There are plenty of choices</span></p>
                            <a href="#vehicles" class="btn home-p">Explorer les voitures</a>
                        </div>
                        <img class="home-img" src="images/home.png" alt="" id="home-img">
                    </div>
                </div>
                <div class="slider-1">
                    <div class="home-bg"></div>
                    <div class="home-content">
                        <div class="details">
                            <h1><span class="highlight">BENZ GLE COUPÉ AMG</span>
                            </h1>
                            <p><span class=" highlight">LE SUV DISPONIBLE EN TUNISIE <br>EN HYBRIDE RECHARGEABLE</span>
                            </p>
                            <a href="./car.php?id=<?php echo $row_m["IdV"];?>" class="btn home-p">Découvrir le
                                modèle</a>
                        </div>
                        <img class="home-img" src="./cars/mercedes/mercedes-benz-gle-coupe/main1.png" alt="">
                    </div>
                </div>
                <div class="slider-1">
                    <div class="home-bg"></div>
                    <div class="home-content">
                        <div class="details">
                            <h1><span class="highlight">BMW</span></h1>
                            <p><span class="highlight">La voiture la plus moderne</span></p>
                            <a href="#" class="btn home-p">01 Juillet 2023</a>
                        </div>
                        <img class="home-img" src="./cars/bmw/bmw-x3/main.png">
                    </div>
                </div>
                <div class="slider-1">
                    <div class="home-bg"></div>
                    <div class="home-content">
                        <div class="details">
                            <h1><span class="highlight">AUDI</span></h1>
                            <p><span class="highlight">Pour une meilleure conduite</span></p>
                            <a href="#" class="btn home-p">Voir plus</a>
                        </div>
                        <img class="home-img" src="./cars/audi/audi-q5q/main1.png" alt="">
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
    <script src="./slider.js">
    </script>
    <section class="product" id="vehicles">
        <h2 class="heading">sport & High cars</h2>
        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="product-container">
            <?php 
            $connection = mysqli_connect("localhost", "root", "", "agence_voitures");

            if (!$connection) { // Contrôler la connexion
                die("Connection impossible : " . mysqli_connect_error());
            } else {
                //$user_id=$_SESSION['namelogin'];
                $voitures="SELECT * from voitures where Prix >= 400000 order by Prix DESC";
                //$user="SELECT * from users where Name_User=$user_id";
                $exec_requete = mysqli_query($connection,$voitures);
                if(mysqli_num_rows($exec_requete)>0){
                while($row=mysqli_fetch_assoc($exec_requete)){
                if($row["Remise"]!=0){
                        $x=($row["Remise"]/$row["Prix"])*100;
                        $x=round($x);
                        $y=$row["Prix"]-$row["Remise"];
                echo'
                <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">'.$x.'%</span>
                    <img src="'.$row["Photo_1"].'" alt='.$row["NomVoiture"].' class="product-thumb">
                    <button class="card-btn"><a href="./car.php?id='.$row["IdV"].'" class="btn">check out</a></button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">'.$row["NomVoiture"].'</h2>
                    <p class="product-short-description">'.$row["BOÎTE"].'</p>
                    <p class="product-short-description">'.$row["VITESSE_MAXI"].'</p>
                    <span class="price">'.substr(strval($y),0,3).'&ensp;'.substr(strval($y),3).' DT</span><span class="actual-price">'.substr(strval($row["Prix"]),0,3).'&ensp;'.substr(strval($row["Prix"]),3).' DT</span>
                </div>
                </div>';
                }else{
                echo'<div class="product-card">
                <div class="product-image">
                    <img src="'.$row["Photo_1"].'" alt='.$row["NomVoiture"].' class="product-thumb">
                    <button class="card-btn"><a href="./car.php?id='.$row["IdV"].'" class="btn">check out</a></button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">'.$row["NomVoiture"].'</h2>
                    <p class="product-short-description">'.$row["BOÎTE"].'</p>
                    <p class="product-short-description">'.$row["VITESSE_MAXI"].'</p>
                    <span class="price">'.substr(strval($row["Prix"]),0,3).'&ensp;'.substr(strval($row["Prix"]),3).' DT</span>
                </div>
                </div>';}}}}?>
        </div>
    </section>
    <script>
    const productContainers = [...document.querySelectorAll('.product-container')];
    const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
    const preBtn = [...document.querySelectorAll('.pre-btn')];

    productContainers.forEach((item, i) => {
        let containerDimensions = item.getBoundingClientRect();
        let containerWidth = containerDimensions.width;

        nxtBtn[i].addEventListener('click', () => {
            item.scrollLeft += containerWidth;
        })

        preBtn[i].addEventListener('click', () => {
            item.scrollLeft -= containerWidth;
        })
    })
    </script>
    <section style="background-color:bisque" class="featured" id="featured">
        <h1 class="heading">featured <span>brands</span></h1>
        <div class="card-container">
            <div class="card">
                <a href="./neuf/audi.php">
                    <div class="card-background">
                        <img src="images/categ/audi1.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">audi</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/porsche.php">
                    <div class="card-background">
                        <img src="images/categ/porsche.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">porsche</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/mercedes.php">
                    <div class="card-background">
                        <img src="images/categ/mercedes.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">mercedes</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/bmw.php">
                    <div class="card-background">
                        <img src="images/categ/bmw.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">bmw</span></h3>
                    </div>
                </a>
            </div>
            <!--
            <div class="card">
                <a href="./neuf/hyundai.php">
                    <div class="card-background">
                        <img src="images/categ/hyundai.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">Hyuandai</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/peugeot.php">
                    <div class="card-background">
                        <img src="images/categ/peugeot.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">Peugeot</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/wolkswagen.php">
                    <div class="card-background">
                        <img src="images/categ/golf.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">Wolkswagen</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/kia.php">
                    <div class="card-background">
                        <img src="images/categ/kia.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">Kia</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/renault.php">
                    <div class="card-background">
                        <img src="images/categ/renault.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">Renault</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/toyota.php">
                    <div class="card-background">
                        <img src="images/categ/toyota.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">toyota</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/mazda.php">
                    <div class="card-background">
                        <img src="images/categ/mazda.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">mazda</span></h3>
                    </div>
                </a>
            </div>
            <div class="card">
                <a href="./neuf/fiat.php">
                    <div class="card-background">
                        <img src="images/categ/fiat.png" alt="">
                    </div>
                    <div class="fcontent">
                        <h3 class="card-heading"><span class="highlight-modal">fiat</span></h3>
                    </div>
                </a>
            </div>
-->
    </section>
    <?php
    require_once "./swiper.php";
    ?>
    <?php
    require_once "./testimonials.php";
    ?>
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