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
    <title>Creation Voiture</title>
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
        Ajouter Nouvelle Voiture</h1>
    <form method="post" action="AjoutCar.php" class="form">

        <label for="name">Marque:</label>
        <input type="text" name="Marque" id="name" value="" required>
        <label for="name">Nom voiture:</label>
        <input type="text" name="NomVoiture" id="name" value="" required>
        <label for="name">Sous_Modèle:</label>
        <input type="text" name="Sous_modele" id="name" value="" required>
        <label for="name">Garantie:</label>
        <input type="text" name="GANRANTIE" id="name" value="" required>
        <label for="name">Carosserie:</label>
        <input type="text" name="CARROSSERIE" id="name" value="" required>
        <label for="email">N°Places:</label>
        <input type="text" name="NOMBRE_PLACES" id="email" value="" required>
        <label for="email">N°Portes:</label>
        <input type="text" name="NOMBRE_PORTES" id="email" value="" required>
        <label for="email">N°Cylindres:</label>
        <input type="text" name="NOMBRE_CYLINDRES" id="email" value="" required>
        <label for="email">N°Chevaux:</label>
        <input type="text" name="PUISSANCE_FISCALE" id="email" value="" required>
        <label for="email">Accélération:</label>
        <input type="text" name="0-100_KM/H" id="email" value="" required>
        <label for="email">vitesse_max:</label>
        <input type="text" name="VITESSE_MAXI" id="email" value="" required>
        <label for="email">Prix:</label>
        <input type="number" name="Prix" id="email" value="" required>
        <label for="password">Disponibilité:</label>
        <input type="text" name="Disponibilité" id="password" value="" required>
        <label for="tel">Boite:</label>
        <input type="text" name="BOÎTE" id="password" value="" required>
        <label for="">Energie:</label>
        <input type="text" name="ENERGIE" id="password" value="">
        <label for="email">consommation Urbaine</label>
        <input type="text" name="CONSOMMATION_URBAINE" id="email" value="" required>
        <label for="email">Consommation extra urbaine:</label>
        <input type="text" name="CONSOMMATION_EXTRA_URBAINE" id="email" value="" required>
        <label for="email">Consommation mixte:</label>
        <input type="text" name="CONSOMMATION_MIXTE" id="email" value="" required>
        <label for="file">Photo_1:</label>
        <input type="file" name="Photo_1" id="password" required>
        <label for="file">Photo_2:</label>
        <input type="file" name="Photo_2" id="password" required>
        <label for="file">Photo_3:</label>
        <input type="file" name="Photo_3" id="password" required>
        <label for="file">Photo_4:</label>
        <input type="file" name="Photo_4" id="password" required>
        <label for="file">Photo_5:</label>
        <input type="file" name="Photo_5" id="password" required>
        <label for="file">Photo_6:</label>
        <input type="file" name="Photo_6" id="password" required>


        <input type="submit" value="Register" name="bouton">

    </form>
</body>

</html>