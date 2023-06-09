<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if(isset($_GET['id'])){
    	$id = $_GET['id'];
        $voitures="SELECT * from voitures where IdV=$id";
        $exec_requete = mysqli_query($connection,$voitures);
        $row=mysqli_fetch_assoc($exec_requete);
        $x = $row["CARROSSERIE"];
        $y = $row["Marque"];
        $z = $row["NOMBRE_CYLINDRES"];
        $n = $row["NomVoiture"]; 
        $voiture="SELECT *
        FROM (SELECT *, ROW_NUMBER() OVER(ORDER BY rn) AS R from(
          SELECT *,
            ROW_NUMBER() OVER (PARTITION BY Marque ORDER BY Prix) AS rn
          FROM voitures
          WHERE Carrosserie = '$x' AND Marque <> '$y'
          group by NomVoiture
        ) AS rankings
        WHERE rn <= rand()*10 +1) As Ranks
        WHERE R<= rand()*10 +1;
        ";
        $requete = mysqli_query($connection,$voiture);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["NomVoiture"]; ?></title>
    <link rel="shortcut icon" href="./images/Icones/voiture.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <style>
    .user .user-container img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: contain;
    }

    h2.sous-titre {
        padding: 0 10px 10px;
        margin: 0 10px 10px;
        font-size: 3rem;
        font-family: 'Times New Roman', Times, serif;
        text-transform: uppercase;
        color: #666;
    }

    h2.sous-titre-gal {
        font-size: 1.7rem;
        font-family: 'Times New Roman', Times, serif;
        text-transform: uppercase;

        color: #666;
    }

    .voiture-selected {
        margin: 20px;
        width: 80%;
        height: 20%;
    }

    .modele-similaire {
        margin: 0 auto;
        width: 75%;
        display: flex;
        flex-wrap: wrap;
        align-items: left;
        justify-content: space-around;
    }

    .sous-modele-similaire {
        display: block;
        width: 25%;
        margin-right: 10px;
    }

    .sous-modele-similaire .m-s-image {
        width: 100%;
    }




    .m-s-lien:hover {
        color: blue;
    }

    /*.m-s-lien:active {
        color: blue;
    }

    .m-s-lien:focus {
        color: blue;
    }*/
    h2 {
        font-size: auto;
    }

    .details {
        width: 50%;
        margin: auto;
        padding: 1%;
        background-color: red;
        color: white;
        font-size: 3rem;
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
        flex: 0 0 30%;
        width: 250px;
        height: auto;
        margin-right: 40px;
    }

    .product-image {
        position: relative;
        width: 100%;
        height: auto;
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
        bottom: 10px;
        left: 50%;
        padding: 10px;
        width: 90%;
        margin: 0 auto;
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

    @media screen and (max-width: 780px) {
        .details {
            width: 50%;
            font-size: 1.5rem;

        }

        .product-card {
            flex: 0 0 40%;
            /* Ajustez la valeur en fonction de vos besoins */
        }
    }

    @media screen and (max-width: 480px) {
        .product-card {
            flex: 0 0 20%;
            /* Ajustez la valeur en fonction de vos besoins */
        }

        html {
            font-size: 50%;
        }

        .user .user-container i {
            font-size: 1rem;
        }

        .user .user-container img {
            height: 25px;
            width: 25px;
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
    <header class="header">
        <a href="./index.php" class="logo"><span>Kar</span>hebti.tn</a>
        <nav class="navbar">
            <span class="close" id="close-navbar">&times;</span>
            <a href="#home">home</a>
            <a href="#vehicules">vehicules</a>
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
                    <i class=" fa fa-ellipsis-h" aria-hidden="true"></i>
                    <a href="./logout.php"><button class="btn" id="logoutbtn">log out</button></a>
                </div>
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

                    <input type="submit" name="bouton" value="sign up" class="btn">
                </form>


            </div>
        </div>
        <script>
        var login = document.getElementById("loginbtn");
        var login_backup = document.getElementById("loginbtn-backup");
        var lform = document.getElementById("login-form");

        var signup = document.getElementById("signupbtn");
        var signup_backup = document.getElementById("signupbtn-backup");
        var sform = document.getElementById("signup-form");

        var modal = document.querySelector(".modal");
        var modalC = document.querySelector(".modal-content");
        var close = document.getElementById("close-modal");
        var i = document.getElementById("i");
        var closeNav = document.getElementById("close-navbar");


        var closeNav = document.getElementById("close-navbar");
        login_backup.onclick = function() {
            lform.style.display = "block";
            sform.style.display = "none";
            modal.style.display = "block";
            navElements.style.marginLeft = "-1500px";
        }

        login.onclick = function() {
            lform.style.display = "block";
            sform.style.display = "none";
            modal.style.display = "block";
        }

        signup_backup.onclick = function() {
            sform.style.display = "block";
            lform.style.display = "none";
            modal.style.display = "block";
            navElements.style.marginLeft = "-1500px";
        }

        signup.onclick = function() {
            sform.style.display = "block";
            lform.style.display = "none";
            modal.style.display = "block";
        }
        var navElements = document.querySelector(".navbar");
        i.onclick = function() {
            navElements.style.marginLeft = "0px";
        }
        closeNav.onclick = function() {
            navElements.style.marginLeft = "-1500px";
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
    <div class="bloc-title">
        <h3 class="title">
            <?php echo $row["NomVoiture"].'<br><h2 class="sous-titre">'.$row["Sous_modele"].'</h2>'; ?>
        </h3>
        <?php echo'<img src="'.$row["Photo_1"].'" alt="" class="voiture-selected">'; ?>
    </div>
    <a href="#">
        <div class=" details">
            a partir de <span>
                <?php
                if($row["Remise"]!=0){
                    if($row["Date_fin"]=="0000-00-00"){
                        echo'<script>
                        console.log('.$row["Date_fin"].')</script>';
                    }
                    else{
                        $date = date("Y-m-d");
                        if($row["Date_fin"]>=$date){
                        $row["Prix"]=$row["Prix"]-$row["Remise"];}
                    }
                }
                echo substr(strval($row["Prix"]),0,3).'&ensp;'.substr(strval($row["Prix"]),3); ?>DT</span>
        </div>
    </a>
    <!--<div style="width:100%;" class="gal">
        <div style="width:50%; margin:auto;display:flex; justify-content:center;align-items:center;">
            <img height=50% src="./images/Icones/devis.png" alt="">
            <a href="./formDevis.com">
                <h1>Devis</h1>
            </a>
        </div>
    </div>-->
    <div class="gal">
        <h3>gallery</h3>
    </div>
    <div class="gallerie">
        <?php echo'<img src="'.$row["Photo_1"].'" alt="" class="pic">'; ?>
        <?php echo'<img src="'.$row["Photo_2"].'" alt="" class="pic">'; ?>
        <?php echo'<img src="'.$row["Photo_3"].'" alt="" class="pic">'; ?>
        <?php echo'<img src="'.$row["Photo_4"].'" alt="" class="pic">'; ?>
        <?php echo'<img src="'.$row["Photo_5"].'" alt="" class="pic">'; ?>
        <?php echo'<img src="'.$row["Photo_6"].'" alt="" class="pic">'; ?>
    </div>
    <div class="fiche">
        <div class="fiche-title">
            <h3>fiche technique <br>
                <?php echo $row["NomVoiture"].'&ensp;'.$row["Sous_modele"]; ?>
            </h3>
        </div>
        <div class="tables">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Caractéristiques</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Carrosserie</th>
                        <td><?php echo $row["CARROSSERIE"] ?></td>
                    </tr>

                    <tr>
                        <th>Garantie</th>
                        <td><?php echo $row["GANRANTIE"] ?></td>
                    </tr>

                    <tr>
                        <th>Nombre de places</th>
                        <td><?php echo $row["NOMBRE_PLACES"] ?></td>
                    </tr>

                    <tr>
                        <th>Nombre de portes</th>
                        <td><?php echo $row["NOMBRE_PORTES"]?></td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Motorisation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Nombre de cylindres</th>
                        <td><?php echo $row["NOMBRE_CYLINDRES"] ?></td>
                    </tr>

                    <tr>
                        <th>Energie </th>
                        <td><?php echo $row["ENERGIE"] ?></td>
                    </tr>

                    <tr>
                        <th>Puissance fiscale</th>
                        <td><?php echo $row["PUISSANCE_FISCALE"] ?></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">TRANSMISSION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>BOÎTE</th>
                        <td><?php echo $row["BOÎTE"]; ?></td>
                    </tr>

                    <tr>
                        <th>NOMBRE DE RAPPORTS </th>
                        <td><?php echo$row["Nbre_Rapport"];?></td>
                    </tr>

                    <tr>
                        <th>TRANSMISSION</th>
                        <td><?php echo$row["Transmission"];?></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">DIMENSIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>LONGUEUR</th>
                        <td><?php echo $row["Longueur"].' mm'; ?></td>
                    </tr>

                    <tr>
                        <th>LARGEUR</th>
                        <td><?php echo$row["Largeur"].' mm';?></td>
                    </tr>

                    <tr>
                        <th>HAUTEUR</th>
                        <td><?php echo$row["Hauteur"].' mm';?></td>
                    </tr>
                    <?php if($row["Volume_Coffre"]!=0){
                        echo'<tr>
                        <th>VOLUME DU COFFRE</th>
                        <td>'.$row["Volume_Coffre"].' L</td></tr>';
                    }?>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">Performances</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>0-100 Km/h</th>
                        <td><?php echo substr($row["Acceleration"],0,3).'&ensp;S'; ?></td>
                    </tr>

                    <tr>
                        <th>Vitesse maxi</th>
                        <td><?php echo$row["VITESSE_MAXI"];?></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">Consommation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($row["CONSOMMATION_URBAINE"])){
                        echo'<tr>
                        <th>Consommation urbaine </th>
                        <td>'.$row["CONSOMMATION_URBAINE"].' L</td></tr>';
                    } ?>

                    <?php if(!empty($row["CONSOMMATION_EXTRA_URBAINE"])){
                        echo'<tr>
                        <th>Consommation extra-urbaine</th>
                        <td>'.$row["CONSOMMATION_EXTRA_URBAINE"].' L</td></tr>';
                    } ?>

                    <?php if(!empty($row["CONSOMMATION_MIXTE"])){
                        echo'<tr>
                        <th>Consommation mixte </th>
                        <td>'.$row["CONSOMMATION_MIXTE"].' L</td></tr>';
                    } ?>

                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">EQUIPEMENTS DE SÉCURITÉ
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>ABS </th>
                        <td><?php echo$row["Abs"];?></td>
                    </tr>

                    <tr>
                        <th>AIRBAGS</th>
                        <td><?php echo$row["Airbags"];?></td>
                    </tr>

                    <tr>
                        <th>ANTI-PATINAGE</th>
                        <td><?php echo$row["Anti_Patinage"];?></td>
                    </tr>

                    <tr>
                        <th>ASSISTANCE AU FREINAGE</th>
                        <td><?php echo$row["ASSISTANCE_FREINAGE"];?></td>
                    </tr>

                    <tr>
                        <th>ANTI-DÉMARRAGE ÉLECTRONIQUE</th>
                        <td><?php echo$row["Anti_Démarrage_électronique"];?></td>
                    </tr>

                    <tr>
                        <th>CONTRÔLE DE PRESSION DES PNEUS</th>
                        <td><?php echo$row["Controle_Pression_Pneus"];?></td>
                    </tr>

                    <tr>
                        <th>FIXATIONS ISOFIX</th>
                        <td><?php echo$row["Fixations_Isofix"];?></td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">EQUIPEMENTS EXTÉRIEURS </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>AIDE AU STATIONNEMENT </th>
                        <td><?php echo $row["Stationnement"]; ?></td>
                    </tr>

                    <tr>
                        <th>BAGUETTES EXTÉRIEURES D'ENCADREMENT DES VITRES </th>
                        <td><?php echo $row["BAGUETTES_EXTÉRIEURES_ENCADREMENT_VITRES"]; ?></td>
                    </tr>

                    <tr>
                        <th>ELÉMENTS EXTÉRIEURS COULEUR CARROSSERIE </th>
                        <td><?php echo $row["ELÉMENTS_EXTÉRIEURS_COULEUR_CARROSSERIE"]; ?></td>
                    </tr>

                    <tr>
                        <th>FEUX À LED </th>
                        <td><?php echo$row["FEUX_LED"];?></td>
                    </tr>

                    <tr>
                        <th>JANTES</th>
                        <td><?php echo $row["JANTES"]; ?></td>
                    </tr>

                    <tr>
                        <th>KIT CARROSSERIE </th>
                        <td><?php echo $row["KIT_CARROSSERIE"]; ?></td>
                    </tr>

                    <tr>
                        <th>PEINTURE</th>
                        <td><?php echo $row["PEINTURE"]; ?></td>
                    </tr>

                    <tr>
                        <th>PHARES</th>
                        <td><?php echo $row["PHARES"]; ?></td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="gal">
            <h3>
                MODÈLES SIMILAIRES
                <br>
                <h2 class="sous-titre-gal">
                    DANS LA MÊME GAMME
                </h2>
            </h3>
        </div>
    </div>
    <section class="product">

        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="product-container">

            <?php
            if(mysqli_num_rows($requete)>0){
                while($row2=mysqli_fetch_assoc($requete)){
                    if($row2["Remise"]!=0){
                        $x=($row2["Remise"]/$row2["Prix"])*100;
                        $x=round($x);
                        $y=$row2["Prix"]-$row2["Remise"];
                        echo'<div class="product-card">
                        <div class="product-image">
                        <span class="discount-tag">'.$x.'%</span>
                        <img src="'.$row2["Photo_1"].'" alt='.$row2["NomVoiture"].' class="product-thumb">
                        <button class="card-btn"><a href="./car.php?id='.$row2["IdV"].'" class="btn">check out</a></button>
                        </div>
                        <div class="product-info">
                        <h2 class="product-brand">'.$row2["NomVoiture"].'</h2>
                        <p class="product-short-description">'.$row2["BOÎTE"].'</p>
                        <p class="product-short-description">'.$row2["VITESSE_MAXI"].'</p>
                        <span class="price">'.substr(strval($y),0,3).'&ensp;'.substr(strval($y),3).' DT</span><span class="actual-price">'.substr(strval($row2["Prix"]),0,3).'&ensp;'.substr(strval($row2["Prix"]),3).' DT</span>
                        </div>
                        </div>';
                    }else{
                        echo'<div class="product-card">
                        <div class="product-image">
                        <img src="'.$row2["Photo_1"].'" alt='.$row2["NomVoiture"].' class="product-thumb">
                        <button class="card-btn"><a href="./car.php?id='.$row2["IdV"].'" class="btn">check out</a></button>
                        </div>
                        <div class="product-info">
                        <h2 class="product-brand">'.$row2["NomVoiture"].'</h2>
                        <p class="product-short-description">'.$row2["BOÎTE"].'</p>
                        <p class="product-short-description">'.$row2["VITESSE_MAXI"].'</p>
                        <span class="price">'.substr(strval($row2["Prix"]),0,3).'&ensp;'.substr(strval($row2["Prix"]),3).' DT</span>
                        </div>
                        </div>';
                    }
                    }
                    }
                
                ?>
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
            <div class="box">
                <h3>more info</h3>
                <a href="./index.php#vehicles"><i class="fa fa-car" style="font-size:1.5rem;"></i>brand lists</a>
            </div>
        </div>

        <div class="credit"> Created By Youssef Jouini </div>

    </footer>
</body>

</html>
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
?>