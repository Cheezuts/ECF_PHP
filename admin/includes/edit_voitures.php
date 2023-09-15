<?php
if (isset($_GET['p_id'])) {
    $the_voiture_id = escape($_GET['p_id']);
}

$query = "SELECT * FROM voitures WHERE voiture_id = $the_voiture_id";
$select_voiture_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_voiture_by_id)) {
    $voiture_id = $row['voiture_id'];
    $marque = escape($row['marque']);
    $modele = escape($row['modele']);
    $annee = escape($row['annee_mise_en_circulation']);
    $carburant = escape($row['carburant']);
    $kilometrage = escape($row['kilometrage']);
    $prix = escape($row['prix']);
    $description = escape($row['description']);
    $image = escape($row['image']);
    $photos = escape($row['photos']);
}

if (isset($_POST['update_voiture'])) {
    $marque = escape($_POST['marque']);
    $modele = escape($_POST['modele']);
    $annee = escape($_POST['annee']);
    $carburant = escape($_POST['carburant']);
    $kilometrage = escape($_POST['kilometrage']);
    $prix = escape($_POST['prix']);
    $description = nl2br(escape($_POST['description']));
    $image = escape($_FILES['image']['name']);
    $image_temp = escape($_FILES['image']['tmp_name']);
    $photos = escape($_FILES['photos']['name']);
    $photos_temp = $_FILES['photos']['tmp_name'];



    // Gestion de l'image principale
    if (!empty($image)) {
        move_uploaded_file($image_temp, "../images/" . escape($image));
    } else {
        $query = "SELECT image FROM voitures WHERE voiture_id = $the_voiture_id";
        $select_image = mysqli_query($connection, $query);

        if ($row = mysqli_fetch_assoc($select_image)) {
            $image = $row['image'];
        }
    }

    // Gestion des photos supplémentaires
    if (empty($photos)) {
        $query = "SELECT photos FROM voitures WHERE voiture_id = $the_voiture_id";
        $select_photos = mysqli_query($connection, $query);

        if ($row = mysqli_fetch_assoc($select_photos)) {
            $photos = $row['photos'];
        }
    } else {
        // Tableau pour stocker les noms des fichiers des photos supplémentaires
        $photoList = array();

        // Parcourir les photos supplémentaires
        foreach ($photos_temp as $key => $tmp_name) {
            $photoName = escape($photos[$key]);
            $photoTemp = escape($photos_temp[$key]);

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
    $query .= "marque = '" . escape($marque) . "', ";
    $query .= "modele = '" . escape($modele) . "', ";
    $query .= "annee_mise_en_circulation = '" . escape($annee) . "', ";
    $query .= "carburant = '" . escape($carburant) . "', ";
    $query .= "kilometrage = '" . escape($kilometrage) . "', ";
    $query .= "prix = '" . escape($prix) . "', ";
    $query .= "description = '" . escape($description) . "', ";
    $query .= "image = '" . escape($image) . "', ";
    $query .= "photos = '" . escape($photos) . "' ";
    $query .= "WHERE voiture_id = " . escape($the_voiture_id);

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