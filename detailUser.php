<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    $voitures="SELECT * from users";
    $exec_requete = mysqli_query($connection,$voitures);
}
$info=isset($_SESSION['info']);
$creation=isset($_SESSION['Création']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Utilisateurs</title>
    <link rel="shortcut icon" href="./images/Icones/person2_icon.png" type="image/x-icon">
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

    </style>
</head>

<body>
    <header class="header">
        <a href="./index.php" class="logo"><span>Kar</span>hebti.tn</a>
        <nav class="navbar" style="margin-bottom:0; min-height:auto;">
            <span class="close" id="close-navbar">&times;</span>
            <a href="./index.php#home">home</a>
            <a href="./index.php#vehicules">vehicules</a>
            <a href="./index.php#featured">featured</a>
            <a href="./index.php#contact">contact</a>
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
                    <a href="./logoutadmin.php"> <button class="btn" id="logoutbtn">log out</button></a>
                </div>
            </div>
            <i class="far fa-user"></i>
        </div>
        <div class="modal" id="login-modal">
            <div class="modal-content" id="modal-content" style="background:none;">
                <span class="close">&times;</span>
                <form method="post" name="login" action="./Loginadmin.php" id="login-form">
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
    </header>
    <div class="container p-30">
        <div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        <div class="col-sm-4 createSegment">
                            <a href="./AjouterClient.php" class="btn dim_button create_new"> <span
                                    class="glyphicon glyphicon-plus"></span>Ajouter Utilisateur</a>
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
                                    <th style="min-width:50px;">Nom Utilisateur</th>
                                    <th style="min-width:200px;">Email</th>
                                    <th style="min-width:200px;">Mot de Passe</th>
                                    <th style="min-width:150px;">Type</th>
                                    <th style="min-width:150px;">N°Telephone</th>
                                    <th style="min-width:50px;">Photo</th>
                                    <th style="min-width:150px;">Voir Plus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(mysqli_num_rows($exec_requete)>0){
                                    while($row=mysqli_fetch_assoc($exec_requete)){
                                        if($row["password_user"]=="ADMIN"){
                                            if($row["Phone"]==NULL){
                                                echo '<tr><td>'.$row["Name_User"].'</td>
                                                <td style="text-transform:initial;">'.$row["Email_User"].'</td>
                                                <td>'.$row["password_user"].'</td>
                                                <td><span class="mode mode_process">Administrateur</span></td>
                                                <td><span class="mode mode_off">N.C</span></td>
                                                <td><img width=100% height=100% src="'.$row["Photo"].'"></td>
                                                <td>
                                                
                                                
                                                <div class="btn-group">
                                                    <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown_more">
                                                        <li>
                                                            <a href="./modifierClient.php?id='.$row["IdU"].'">
                                                                <i class="fa fa-clone"></i>Modifier
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="./supprimerClient.php?id='.$row["IdU"].'">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                                </td>
                                                </tr>';
                                                }
                                            
                                            else{
                                                echo '<tr><td>'.$row["Name_User"].'</td>
                                                <td style="text-transform:initial;">'.$row["Email_User"].'</td>
                                                <td>'.$row["password_user"].'</td>
                                                <td><span class="mode mode_process">Administrateur</span></td>
                                                <td><span class="mode mode_on">'.$row["Phone"].'</span></td>

                                                <td><img width=100% height=100% src="'.$row["Photo"].'"></td>
                                                <td>
                                            
                                            
                                                <div class="btn-group">
                                                    <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown_more">
                                                        <li>
                                                            <a href="./modifierClient.php?id='.$row["IdU"].'">
                                                                <i class="fa fa-clone"></i>Modifier
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="./supprimerClient.php?id='.$row["IdU"].'">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                                </td>
                                                </tr>';
                                                }
                                        }else{
                                            if($row["Phone"]==NULL){
                                                echo '<tr><td>'.$row["Name_User"].'</td>
                                                <td style="text-transform:initial;">'.$row["Email_User"].'</td>
                                                <td>'.$row["password_user"].'</td>
                                                <td><span class="mode mode_done">Client</span></td>
                                                <td><span class="mode mode_off">N.C</span></td>
                                                <td><img width=100% height=100% src="'.$row["Photo"].'"></td>

                                                <td>
                                                
                                                
                                                <div class="btn-group">
                                                    <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown_more">
                                                        <li>
                                                            <a href="./modifierClient.php?id='.$row["IdU"].'">
                                                                <i class="fa fa-clone"></i>Modifier
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="./supprimerClient.php?id='.$row["IdU"].'">
                                                                <i class="fa fa-trash"></i> Supprimer
                                                            </a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                                </td>
                                                </tr>';
                                                }
                                            
                                            else{
                                                echo '<tr><td>'.$row["Name_User"].'</td>
                                                <td style="text-transform:initial;">'.$row["Email_User"].'</td>
                                                <td>'.$row["password_user"].'</td>
                                                <td><span class="mode mode_done">Client</span></td>
                                                <td><span class="mode mode_on">'.$row["Phone"].'</span></td>
                                                <td><img width=100% height=100% src="'.$row["Photo"].'"></td>
                                                <td>
                                                
                                                
                                                <div class="btn-group">
                                                    <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown_more">
                                                        <li>
                                                            <a href="./modifierClient.php?id='.$row["IdU"].'">
                                                                <i class="fa fa-clone"></i>Modifier
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="./supprimerClient.php?id='.$row["IdU"].'">
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
            "pageLength": 3,
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
                    user.style.display="block";
                    login.style.display="none";
                    signup.style.display="none";</script>';}
}
if($info=="Utilisateur supprimé avec succès.") { 
    echo "<script>
                Swal.fire({
                    title: 'Bravo!',
                    text: 'Utilisateur a été supprimé avec succés',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3205d1',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'detailUser.php';
                    }
                });
              </script>";
}
if($creation=="Utilisateur Ajouté avec succès.") { 
    echo "<script>
                Swal.fire({
                    title: 'Bravo!',
                    text: 'Utilisateur a été ajouté avec succés',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3205d1',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'detailUser.php';
                    }
                });
            </script>";
}
unset($_SESSION['info']);
unset($_SESSION['Création']);


?>