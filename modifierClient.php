<?php 
session_start();
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if(isset($_GET['id'])){
    	$id = $_GET['id'];
        $Users="Select * from users where IdU=$id";
        $exec_requete = mysqli_query($connection,$Users);
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
    input[type="tel"] {
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
        Ajout Utilisateur</h1>
    <form method="post" action="Modification.php">
        <input style="dispaly:none;" type="hidden" name="id" id="name" value="<?php echo$row["IdU"];?>" required>

        <label for=" name">Nom & Prénom:</label>
        <input type="text" name="name" id="name" value="<?php echo$row["Name_User"];?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo$row["Email_User"];?>" required>

        <label for="password">Mot de Passe:</label>
        <input type="password" name="password" id="password" value="<?php echo$row["password_user"];?>" required>

        <label for="tel">N°tel:</label>
        <input type="tel" name="Phone" id="password" value="<?php echo$row["Phone"];?>">

        <label for="file">Photo:</label>
        <input type="file" name="Photo" id="password">

        <input type="submit" value="Register" name="bouton">
    </form>
</body>

</html>