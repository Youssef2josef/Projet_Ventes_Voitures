<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Utilisateur</title>
    <link rel="shortcut icon" href="./images/Icones/person_title.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
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
        flex-shrink: 0;

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
    <form method="post" action="Ajout.php">
        <label for="name">Nom & Prénom:</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mot de Passe:</label>
        <input type="password" name="password" id="password" required>

        <label for="tel">N°tel:</label>
        <input type="tel" name="Phone" id="password">

        <label for="file">Photo:</label>
        <input type="file" name="Photo" id="password">

        <input type="submit" value="Register" name="bouton">
    </form>
</body>

</html>