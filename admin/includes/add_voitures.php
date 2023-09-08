<?php

if (isset($_POST['create_voiture'])) {
    // Récupération des données du formulaire
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $carburant = $_POST['carburant'];
    $kilometrage = $_POST['kilometrage'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

    // Stockage des photos supplémentaires
    $additionalPhotos = $_FILES['photos'];

    // Tableau pour stocker les noms des fichiers des photos supplémentaires
    $photoList = array();

    // Parcourir les photos supplémentaires
    foreach ($additionalPhotos['tmp_name'] as $key => $tmp_name) {
        $photoName = $additionalPhotos['name'][$key];
        $photoTemp = $additionalPhotos['tmp_name'][$key];

        // Déplacer et renommer les photos supplémentaires vers le dossier de destination
        $destination = "../images/" . $photoName;
        move_uploaded_file($photoTemp, $destination);

        // Ajouter le nom du fichier de la photo dans le tableau
        $photoList[] = $photoName;
    }

    // Concaténer les noms des fichiers des photos supplémentaires en une chaîne de caractères
    $photos = implode(',', $photoList);

    // Déplacer et renommer l'image principale vers le dossier de destination
    move_uploaded_file($image_temp, "../images/$image");

    // Requête d'insertion dans la base de données
    $query = "INSERT INTO voitures (marque, modele, annee_mise_en_circulation, carburant, kilometrage, prix, description, image, photos) ";
    $query .= "VALUES ('$marque', '$modele', $annee, '$carburant', $kilometrage, $prix, '$description', '$image', '$photos')";

    $create_voiture_query = mysqli_query($connection, $query);

    confirmQuery($create_voiture_query);

    header("Location: voitures.php");
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="marque">Marque</label>
        <input type="text" class="form-control" name="marque">
    </div> 
        
    <div class="form-group">
        <label for="modele">Modèle</label>
        <input type="text" class="form-control" name="modele">
    </div>
    
    <div class="form-group">
        <label for="annee">Année de mise en circulation</label>
        <input type="number" class="form-control" name="annee">
    </div>
    
    <div class="form-group">
        <label for="carburant">Carburant</label>
        <input type="text" class="form-control" name="carburant">
    </div>
    
    <div class="form-group">
        <label for="kilometrage">Kilométrage</label>
        <input type="number" class="form-control" name="kilometrage">
    </div>
    
    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="number" step="0.01" class="form-control" name="prix">
    </div>
    
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="photos">Photos</label>
        <input type="file" name="photos[]" multiple>
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_voiture" value="Publier">
    </div>
</form>