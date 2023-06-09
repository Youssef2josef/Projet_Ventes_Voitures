<?php
session_start();

// Connexion à MySQL
$connection = mysqli_connect("localhost", "root", "", "agence_voitures");

if (!$connection) { // Contrôler la connexion
    die("Connection impossible : " . mysqli_connect_error());
} else {
    if (isset($_POST['bouton'])) { // Autre contrôle pour vérifier si la variable $_POST['bouton'] est bien définie
        $Marque = $_POST['Marque'];
        $NomVoiture = $_POST['NomVoiture'];
        $Sous_modele = $_POST['Sous_modele'];
        $GANRANTIE=$_POST['GANRANTIE'];
        $CARROSSERIE = $_POST['CARROSSERIE'];
        $NOMBRE_PLACES = $_POST['NOMBRE_PLACES'];
        $NOMBRE_PORTES = $_POST['NOMBRE_PORTES'];
        $NOMBRE_CYLINDRES = $_POST['NOMBRE_CYLINDRES'];
        $PUISSANCE_FISCALE = $_POST['PUISSANCE_FISCALE'];
        $acceleration = $_POST['0-100_KM/H'];
        $VITESSE_MAXI = $_POST['VITESSE_MAXI'];
        $Prix = $_POST['Prix'];
        $Disponibilité = $_POST['Disponibilité'];
        $BOÎTE = $_POST['BOÎTE'];
        $ENERGIE = $_POST['ENERGIE'];
        $CONSOMMATION_URBAINE = $_POST['CONSOMMATION_URBAINE'];
        $CONSOMMATION_EXTRA_URBAINE = $_POST['CONSOMMATION_EXTRA_URBAINE'];     
        $CONSOMMATION_MIXTE = $_POST['CONSOMMATION_MIXTE'];     
        $Photo_1 = $_POST['Photo_1'];     
        $Photo_2 = $_POST['Photo_2'];     
        $Photo_3 = $_POST['Photo_3'];     
        $Photo_4 = $_POST['Photo_4'];     
        $Photo_5 = $_POST['Photo_5'];     
        $Photo_6 = $_POST['Photo_6'];
        $marque=strtolower($Marque);
        $modele=strtolower($NomVoiture);  
        if(strtoupper($Marque)==strtoupper("Audi")){
            $voiture = "INSERT INTO voitures (Marque,NomVoiture,Sous_modele,GANRANTIE,CARROSSERIE,NOMBRE_PLACES,NOMBRE_PORTES,NOMBRE_CYLINDRES,PUISSANCE_FISCALE,Acceleration,VITESSE_MAXI,Prix,Disponibilité,BOÎTE,ENERGIE,CONSOMMATION_URBAINE,CONSOMMATION_EXTRA_URBAINE,CONSOMMATION_MIXTE,Photo_1,Photo_2,Photo_3,Photo_4,Photo_5,Photo_6)
            VALUES ('$Marque', '$NomVoiture', '$Sous_modele', '$GANRANTIE' ,'$CARROSSERIE','$NOMBRE_PLACES','$NOMBRE_PORTES','$NOMBRE_CYLINDRES','$PUISSANCE_FISCALE','$acceleration','$VITESSE_MAXI','$Prix','$Disponibilité','$BOÎTE','$ENERGIE','$CONSOMMATION_URBAINE','$CONSOMMATION_EXTRA_URBAINE','$CONSOMMATION_MIXTE','./cars/$marque/$modele/$Photo_1','./cars/$marque/$modele/$Photo_2','./cars/$marque/$modele/$Photo_3','./cars/$marque/$modele/$Photo_4','./cars/$marque/$modele/$Photo_5','./cars/$marque/$modele/$Photo_6')";}                
        elseif(strtoupper($Marque)==strtoupper("bmw")){
            $voiture = "INSERT INTO voitures (Marque,NomVoiture,Sous_modele,GANRANTIE,CARROSSERIE,NOMBRE_PLACES,NOMBRE_PORTES,NOMBRE_CYLINDRES,PUISSANCE_FISCALE,Acceleration,VITESSE_MAXI,Prix,Disponibilité,BOÎTE,ENERGIE,CONSOMMATION_URBAINE,CONSOMMATION_EXTRA_URBAINE,CONSOMMATION_MIXTE,Photo_1,Photo_2,Photo_3,Photo_4,Photo_5,Photo_6)
            VALUES ('$Marque', '$NomVoiture', '$Sous_modele', '$GANRANTIE' ,'$CARROSSERIE','$NOMBRE_PLACES','$NOMBRE_PORTES','$NOMBRE_CYLINDRES','$PUISSANCE_FISCALE','$acceleration','$VITESSE_MAXI','$Prix','$Disponibilité','$BOÎTE','$ENERGIE','$CONSOMMATION_URBAINE','$CONSOMMATION_EXTRA_URBAINE','$CONSOMMATION_MIXTE','./cars/$marque/$modele/$Photo_1','./cars/$marque/$modele/$Photo_2','./cars/$marque/$modele/$Photo_3','./cars/$marque/$modele/$Photo_4','./cars/$marque/$modele/$Photo_5','./cars/$marque/$modele/$Photo_6')";}                
        elseif(strtoupper($Marque)==strtoupper("mercedes")){
            $voiture = "INSERT INTO voitures (Marque,NomVoiture,Sous_modele,GANRANTIE,CARROSSERIE,NOMBRE_PLACES,NOMBRE_PORTES,NOMBRE_CYLINDRES,PUISSANCE_FISCALE,Acceleration,VITESSE_MAXI,Prix,Disponibilité,BOÎTE,ENERGIE,CONSOMMATION_URBAINE,CONSOMMATION_EXTRA_URBAINE,CONSOMMATION_MIXTE,Photo_1,Photo_2,Photo_3,Photo_4,Photo_5,Photo_6)
            VALUES ('$Marque', '$NomVoiture', '$Sous_modele', '$GANRANTIE' ,'$CARROSSERIE','$NOMBRE_PLACES','$NOMBRE_PORTES','$NOMBRE_CYLINDRES','$PUISSANCE_FISCALE','$acceleration','$VITESSE_MAXI','$Prix','$Disponibilité','$BOÎTE','$ENERGIE','$CONSOMMATION_URBAINE','$CONSOMMATION_EXTRA_URBAINE','$CONSOMMATION_MIXTE','./cars/$marque/$modele/$Photo_1','./cars/$marque/$modele/$Photo_2','./cars/$marque/$modele/$Photo_3','./cars/$marque/$modele/$Photo_4','./cars/$marque/$modele/$Photo_5','./cars/$marque/$modele/$Photo_6')";}                
        else{
            $voiture = "INSERT INTO voitures (Marque,NomVoiture,Sous_modele,GANRANTIE,CARROSSERIE,NOMBRE_PLACES,NOMBRE_PORTES,NOMBRE_CYLINDRES,PUISSANCE_FISCALE,Acceleration,VITESSE_MAXI,Prix,Disponibilité,BOÎTE,ENERGIE,CONSOMMATION_URBAINE,CONSOMMATION_EXTRA_URBAINE,CONSOMMATION_MIXTE,Photo_1,Photo_2,Photo_3,Photo_4,Photo_5,Photo_6)
            VALUES ('$Marque', '$NomVoiture', '$Sous_modele', '$GANRANTIE' ,'$CARROSSERIE','$NOMBRE_PLACES','$NOMBRE_PORTES','$NOMBRE_CYLINDRES','$PUISSANCE_FISCALE','$acceleration','$VITESSE_MAXI','$Prix','$Disponibilité','$BOÎTE','$ENERGIE','$CONSOMMATION_URBAINE','$CONSOMMATION_EXTRA_URBAINE','$CONSOMMATION_MIXTE','./cars/$marque/$modele/$Photo_1','./cars/$marque/$modele/$Photo_2','./cars/$marque/$modele/$Photo_3','./cars/$marque/$modele/$Photo_4','./cars/$marque/$modele/$Photo_5','./cars/$marque/$modele/$Photo_6')";}                
            } 
            $query = mysqli_query($connection, $voiture) or die('Erreur SQL !' . $voiture . '<br>' . mysqli_error($connection));

            if ($query) {
                
            $_SESSION['Création'] = "Voiture Ajouté avec succès.";
			header('location:detailVoiture.php');
                
                exit();
            } else {
                $_SESSION['Création'] = "";
			    header('location:detailVoiture.php');
                exit();
            }
        }
		mysqli_close($connection);
        
    


?>