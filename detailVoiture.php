<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    $voitures="SELECT * from voitures ";
    $exec_requete = mysqli_query($connection,$voitures);
    /*if(mysqli_num_rows($exec_requete)>0){
    while($row=mysqli_fetch_assoc($exec_requete)){
        echo '<div><h1>id:'.$row["IdV"].'</h1><br><h2>marque:'.$row["Marque"].'</h2><br><h2>NomVoiture:'
        .$row["NomVoiture"].'</h2><br><h2>'.$row["GANRANTIE"].$row["CARROSSERIE"].$row["NOMBRE_PLACES"].$row["NOMBRE_PORTES"].$row["BOÎTE"].$row["0-100_KM/H"].$row["VITESSE_MAXI"].$row["NOMBRE_CYLINDRES"].$row["ENERGIE"]
        .$row["PUISSANCE_FISCALE"].'CONSOMMATION_URBAINE:'.$row["CONSOMMATION_URBAINE"].'<br>CONSOMMATION_EXTRA_URBAINE:'.$row["CONSOMMATION_EXTRA_URBAINE"].'<br>CONSOMMATION_MIXTE:'.$row["CONSOMMATION_MIXTE"]
        .'</h2><br><img src="'.$row["Photo_1"].'">'.'<img src="'.$row["Photo_2"].'">'.'<img src="'.$row["Photo_3"].'">'.'<img src="'.$row["Photo_4"].'">'.'</div>';       
    }
    }*/

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Voitures</title>
    <link rel="shortcut icon" href="./images/Icones/v_icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./ensemble_voiture.css">
    <script src="./script.js"></script>
    <script src="./sweetalert2@11.js"></script>
    <style>
    .modal-content {
        background-color: transparent;
    }
    </style>
</head>

<body>
    <header class="header">
        <a href="./index.php" class="logo"><span>Kar</span>hebti.tn</a>
        <nav class="navbar" style="margin-bottom:0;min-height:auto;">
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
                    <img src="<?php echo$_SESSION['photo'];?>" alt="Photo Profil" style="width=50px;height:50px;">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
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
    <div class="container p-30">
        <div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        <div class="col-sm-4 createSegment">
                            <a href="./FormCreationVoiture.php" class="btn dim_button create_new"> <span
                                    class="glyphicon glyphicon-plus"></span>
                                Ajouter Nouveau</a>
                        </div>
                        <div class="col-sm-8 add_flex">
                            <div class="form-group searchInput">
                                <label for="email">Search:</label>
                                <input type="search" class="form-control" id="filterbox" placeholder=" ">
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x">
                        <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                            <thead>
                                <tr>
                                    <th style="min-width:50px;">Marque</th>
                                    <th style="min-width:150px;">Modele</th>
                                    <th style="min-width:150px;">Photo</th>
                                    <th style="min-width:100px;">Type</th>
                                    <th style="min-width:100px;">Prix</th>
                                    <th style="min-width:150px;">DisPoniblité</th>
                                    <th style="min-width:150px;">Voir Plus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(mysqli_num_rows($exec_requete)>0){
                                    while($row=mysqli_fetch_assoc($exec_requete)){
                                        if(strtoupper($row["Marque"])==strtoupper("Audi")){
                                            if(strtoupper($row["Disponibilité"])==strtoupper("Disponible")){
                                                echo '<tr><td style="display:flex; align-items:center;"><img width=100%;height:100%; src="./images/categ/audi.png"></td>
                                                <td>'.strtoupper($row["NomVoiture"]).'</td>
                                                <td><a href="./car.php?id='.$row["IdV"].'" target="_black"><img src="'.$row["Photo_1"].'" width=100%;height:100%></a></td>
                                                <td>'.$row["CARROSSERIE"].'</td>
                                                <td>'.$row["Prix"].'</td>
                                                <td><span class="mode mode_on">'.$row["Disponibilité"].'</span></td>
                                                <td>
                                                
                                                
                                                <div class="btn-group">
                                                    <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown_more">
                                                        <li>
                                                            <a href="./modifierVoiture.php?id='.$row["IdV"].'" target="_black">
                                                                <i class="fa fa-clone"></i>Modifier
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="./supprimerVoiture.php?id='.$row["IdV"].'" target="_black">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                                </td>
                                                </tr>';
                                                }
                                            
                                            else{
                                                echo '<tr><td style="display:flex; align-items:center;"><img width=100%;height:100%; src="./images/categ/audi.png"></td>
                                                <td>'.strtoupper($row["NomVoiture"]).'</td><td><a href="./car.php?id='.$row["IdV"].'" target="_black">
                                                <img src="'.$row["Photo_1"].'" width=100%;height:100%></a></td>
                                                <td>'.$row["CARROSSERIE"].'</td><td>'.$row["Prix"].'</td><td><span class="mode mode_off">'.$row["Disponibilité"].'</span></td>
                                                <td>
                                                <div class="btn-group">
                                                <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown_more">
                                                    <li>
                                                        <a href="./modifierVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-clone"></i>Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="./supprimerVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-trash"></i> Supprimer
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                                
                                                </td>
                                                </tr>';
                                                }
                                        }elseif(strtoupper($row["Marque"])==strtoupper("BMW")){
                                            if(strtoupper($row["Disponibilité"]=="Disponible")){
                                                echo '<tr><td style="display:flex; align-items:center;"><img width=50%;height:50%; src="./images/categ/bmw.png" style="margin:auto;"></td>
                                                <td>'.strtoupper($row["NomVoiture"]).'</td>
                                                <td><a href="./car.php?id='.$row["IdV"].'" target="_black">
                                            <img src="'.$row["Photo_1"].'" width=100%;height:100%></td>
                                            </a>
                                                <td>'.$row["CARROSSERIE"].'</td>
                                                <td>'.$row["Prix"].'</td>
                                                <td><span class="mode mode_on">'.$row["Disponibilité"].'</span></td>
                                                <td>
                                                <div class="btn-group">
                                                <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown_more">
                                                    <li>
                                                        <a href="./modifierVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-clone"></i>Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="./supprimerVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-trash"></i> Supprimer
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                                </td>
                                                </tr>';
                                                }
                                            
                                            else{
                                                echo '<tr><td style="display:flex; align-items:center;"><img width=50%;height:50%; src="./images/categ/bmw.png" style="margin:auto;"></td>
                                                <td>'.strtoupper($row["NomVoiture"]).'</td><td><a href="./car.php?id='.$row["IdV"].'" target="_black">
                                                <img src="'.$row["Photo_1"].'" width=100%;height:100%></td>
                                                </a><td>'.$row["CARROSSERIE"].'</td><td>'.$row["Prix"].'</td><td><span class="mode mode_off">'.$row["Disponibilité"].'</span></td>
                                                <td>
                                                <div class="btn-group">
                                                <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown_more">
                                                    <li>
                                                        <a href="./modifierVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-clone"></i>Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="./supprimerVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-trash"></i> Supprimer
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                                </div>
                                                
                                                </td>
                                                </tr>';
                                                }
                                                
                                        }elseif(strtoupper($row["Marque"])==strtoupper("Mercedes")){
                                            if(strtoupper($row["Disponibilité"]=="Disponible")){
                                                echo '<tr><td style="display:flex; align-items:center;"><img width=50%;height:50%; src="./images/categ/mercedes.png" style="margin:auto;"></td>
                                                <td>'.strtoupper($row["NomVoiture"]).'</td>
                                                <td><a href="./car.php?id='.$row["IdV"].'" target="_black">
                                                <img src="'.$row["Photo_1"].'" width=100%;height:100%></td>
                                                </a>
                                                <td>'.$row["CARROSSERIE"].'</td>
                                                <td>'.$row["Prix"].'</td>
                                                <td><span class="mode mode_on">'.$row["Disponibilité"].'</span></td>
                                                <td>
                                                <div class="btn-group">
                                                <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown_more">
                                                    <li>
                                                        <a href="./modifierVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-clone"></i>Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="./supprimerVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-trash"></i> Supprimer
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                                </td>
                                                </tr>';
                                                }
                                            else{
                                                echo '<tr><td style="display:flex; align-items:center;"><img width=50%;height:50%; src="./images/categ/mercedes.png" style="margin:auto;"></td>
                                                <td>'.strtoupper($row["NomVoiture"]).'</td>
                                                <td><a href="./car.php?id='.$row["IdV"].'" target="_black">
                                            <img src="'.$row["Photo_1"].'" width=100%;height:100%></td>
                                            </a>
                                                <td>'.$row["CARROSSERIE"].'</td>
                                                <td>'.$row["Prix"].'</td>
                                                <td><span class="mode mode_off">'.$row["Disponibilité"].'</span></td>
                                                <td>
                                                <div class="btn-group">
                                                <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown_more">
                                                    <li>
                                                        <a href="./modifierVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-clone"></i>Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="./supprimerVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-trash"></i> Supprimer
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                                </td>
                                                </tr>';
                                                }
                                                
                                        }
                                        elseif(strtoupper($row["Marque"])==strtoupper("Porsche")){
                                            if(strtoupper($row["Disponibilité"]=="Disponible")){
                                                echo '<tr><td style="display:flex; align-items:center;"><img width=50%;height:50%; src="./images/categ/porsche.png" style="margin:auto;"></td>
                                                <td>'.strtoupper($row["NomVoiture"]).'</td>
                                                <td><a href="./car.php?id='.$row["IdV"].'" target="_black">
                                            <img src="'.$row["Photo_1"].'" width=100%;height:100%></td>
                                            </a>
                                                <td>'.$row["CARROSSERIE"].'</td>
                                                <td>'.$row["Prix"].'</td>
                                                <td><span class="mode mode_on">'.$row["Disponibilité"].'</span></td>
                                                <td>
                                                <div class="btn-group">
                                                <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown_more">
                                                    <li>
                                                        <a href="./modifierVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-clone"></i>Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="./supprimerVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-trash"></i> Supprimer
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                                </td>
                                                </tr>';
                                                }
                                            else{
                                                echo '<tr><td style="display:flex; align-items:center;"><img width=50%;height:50%; src="./images/categ/porsche.png" style="margin:auto;"></td>
                                                <td>'.strtoupper($row["NomVoiture"]).'</td><td><a href="./car.php?id='.$row["IdV"].'" target="_black">
                                                <img src="'.$row["Photo_1"].'" width=100%;height:100%></td>
                                                </a><td>'.$row["CARROSSERIE"].'</td><td>'.$row["Prix"].'</td><td><span class="mode mode_off">'.$row["Disponibilité"].'</span></td>
                                                <td>
                                                <div class="btn-group">
                                                <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown_more">
                                                    <li>
                                                        <a href="./modifierVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-clone"></i>Modifier
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="./supprimerVoiture.php?id='.$row["IdV"].'" target="_black">
                                                            <i class="fa fa-trash"></i> Supprimer
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                                
                                                </td>
                                                </tr>';
                                                }
                                                
                                        }
                                    }
                                }
                                                                        
                                    
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        var dataTable = $('#filtertable').DataTable({
            "pageLength": 4,
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': ['nosort'],
            }],
            columnDefs: [{
                type: 'date-dd-mm-yyyy',
                aTargets: [5]
            }],
            "aoColumns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null
            ],
            "order": false,
            "bLengthChange": false,
            "dom": '<"top">ct<"top"p><"clear">'
        });
        $("#filterbox").keyup(function() {
            dataTable.search(this.value).draw();
        });
    });
    </script>
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
                
                    if(!empty($_SESSION['Création'])){
                    if($_SESSION['Création']=="Voiture Ajouté avec succès."){
                        echo"<script>Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Voiture ajouté avec succés',
                            showConfirmButton: false,
                            timer: 2500
                        })</script>";
                    }elseif($_SESSION['Création']=="Voiture édité avec succès."){
                        echo"<script>Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Voiture édité avec succés',
                            showConfirmButton: false,
                            timer: 2500
                        })</script>";
                    }
                    elseif($_SESSION['Création']=="voiture supprimé avec succès."){
                        echo"<script>Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'voiture supprimé avec succès.',
                            showConfirmButton: false,
                            timer: 2500
                        })</script>";
                    }}
unset($_SESSION['Création']);
?>