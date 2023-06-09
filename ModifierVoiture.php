<?php 
session_start();
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if(isset($_GET['id'])){
    	$id = $_GET['id'];
        $voiture="Select * from voitures where IdV=$id";
        $exec_requete = mysqli_query($connection,$voiture);
        $row = mysqli_fetch_assoc($exec_requete);            
		mysqli_close($connection);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Modification Client</title>
    <link rel="shortcut icon" href="./images/Icones/m_icon.png" type="image/x-icon">
    <style>
    form {
        width: 30%;
        margin: 50px auto;

    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="file"],
    input[type="tel"],
    input[type="number"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <h1
        style="width:30%; margin:50px auto; justify-content:center; font-family:'Times New Roman', Times, serif;color:blueviolet; ">
        Modification Voiture</h1>
    <form method="post" action="Modification_Voiture.php" class="form">
        <input style="dispaly:none;" type="hidden" name="id" id="name" value="<?php echo$row["IdV"];?>" required>
        <label style="font-size:2rem;margin-bottom:15px;" for="name"><?php echo$row["NomVoiture"]?>:</label><br><br><br>

        <label for="name">Carosserie:</label>
        <input type="text" name="CARROSSERIE" id="name" value="<?php echo$row["CARROSSERIE"];?>" required>


        <label for="email">Prix:</label>
        <input type="number" name="Prix" id="email" value="<?php echo$row["Prix"];?>" required>

        <label for="password">Disponibilité:</label>
        <input type="text" name="Disponibilité" id="password" value="<?php echo$row["Disponibilité"];?>" required>

        <label for="tel">Boite:</label>
        <input type="text" name="BOÎTE" id="password" value="<?php echo$row["BOÎTE"];?>">

        <label for="">Energie:</label>
        <input type="text" name="ENERGIE" id="password" value="<?php echo$row["ENERGIE"];?>">

        <input type="submit" value="Register" name="bouton">

    </form>
</body>

</html>