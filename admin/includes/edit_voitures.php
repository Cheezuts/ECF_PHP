<?php
if(isset($_GET['p_id'])) {
    $the_voiture_id = $_GET['p_id'];
}

$query = "SELECT * FROM voitures WHERE voiture_id = $the_voiture_id";
$select_voiture_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_voiture_by_id)) {
    $voiture_id = $row['voiture_id'];
    $marque = $row['marque'];
    $modele = $row['modele'];
    $annee = $row['annee_mise_en_circulation'];
    $carburant = $row['carburant'];
    $kilometrage = $row['kilometrage'];
    $prix = $row['prix'];
    $description = $row['description'];
    $image = $row['image'];
    $photos = $row['photos'];
}

if(isset($_POST['update_voiture'])) {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $annee = $_POST['annee'];
    $carburant = $_POST['carburant'];
    $kilometrage = $_POST['kilometrage'];
    $prix = $_POST['prix'];
    $description = nl2br($_POST['description']);
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $photos = $_FILES['photos']['name'];
    $photos_temp = $_FILES['photos']['tmp_name'];

    // Gestion de l'image principale
    if(!empty($image)) {
        move_uploaded_file($image_temp, "../images/$image");
    } else {
        $query = "SELECT image FROM voitures WHERE voiture_id = $the_voiture_id";
        $select_image = mysqli_query($connection, $query);

        if($row = mysqli_fetch_assoc($select_image)) {
            $image = $row['image'];
        }
    }

    // Gestion des photos supplémentaires
    if(empty($photos)) {
        $query = "SELECT photos FROM voitures WHERE voiture_id = $the_voiture_id";
        $select_photos = mysqli_query($connection, $query);

        if($row = mysqli_fetch_assoc($select_photos)) {
            $photos = $row['photos'];
        }
    } else {
        // Tableau pour stocker les noms des fichiers des photos supplémentaires
        $photoList = array();

        // Parcourir les photos supplémentaires
        foreach ($photos_temp as $key => $tmp_name) {
            $photoName = $photos[$key];
            $photoTemp = $photos_temp[$key];

            // Déplacer et renommer les photos supplémentaires vers le dossier de destination
            $destination = "../images/" . $photoName;
            move_uploaded_file($photoTemp, $destination);

            // Ajouter le nom du fichier de la photo dans le tableau
            $photoList[] = $photoName;
        }

        // Concaténer les noms des fichiers des photos supplémentaires en une chaîne de caractères
        $photos = implode(',', $photoList);
    }

    $query = "UPDATE voitures SET ";
    $query .= "marque = '{$marque}', ";
    $query .= "modele = '{$modele}', ";
    $query .= "annee_mise_en_circulation = '{$annee}', ";
    $query .= "carburant = '{$carburant}', ";
    $query .= "kilometrage = '{$kilometrage}', ";
    $query .= "prix = '{$prix}', ";
    $query .= "description = '{$description}', ";
    $query .= "image = '{$image}', ";
    $query .= "photos = '{$photos}' ";
    $query .= "WHERE voiture_id = {$the_voiture_id} ";

    $update_voiture = mysqli_query($connection, $query);

    confirmQuery($update_voiture);

    header("Location: voitures.php");
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="marque">Marque</label>
        <input value="<?php echo $marque; ?>" type="text" class="form-control" name="marque">
    </div>

    <div class="form-group">
        <label for="modele">Modèle</label>
        <input value="<?php echo $modele; ?>" type="text" class="form-control" name="modele">
    </div>

    <div class="form-group">
        <label for="annee">Année de mise en circulation</label>
        <input value="<?php echo $annee; ?>" type="text" class="form-control" name="annee">
    </div>

    <div class="form-group">
        <label for="carburant">Carburant</label>
        <input value="<?php echo $carburant; ?>" type="text" class="form-control" name="carburant">
    </div>

    <div class="form-group">
        <label for="kilometrage">Kilométrage</label>
        <input value="<?php echo $kilometrage; ?>" type="text" class="form-control" name="kilometrage">
    </div>

    <div class="form-group">
        <label for="prix">Prix</label>
        <input value="<?php echo $prix; ?>" type="text" class="form-control" name="prix">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $description; ?></textarea>
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $image; ?>" alt="">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $photos; ?>" alt="">
        <input type="file" name="photos[]" multiple>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_voiture" value="Editer">
    </div>
</form>