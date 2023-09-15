<?php

if (isset($_POST['create_horaires'])) {
    $statut = escape($_POST['statut']);
    $lundi = escape($_POST['lundi']);
    $mardi = escape($_POST['mardi']);
    $mercredi = escape($_POST['mercredi']);
    $jeudi = escape($_POST['jeudi']);
    $vendredi = escape($_POST['vendredi']);
    $samedi = escape($_POST['samedi']);
    $dimanche = escape($_POST['dimanche']);

    $query = "INSERT INTO horaires_semaine (statut, lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche) ";
    $query .= "VALUES ('$statut', '$lundi', '$mardi', '$mercredi', '$jeudi', '$vendredi', '$samedi', '$dimanche')";

    $create_horaires_query = mysqli_query($connection, $query);

    confirmQuery($create_horaires_query);

    header("Location: horaires.php");
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="statut">Statut</label>
        <select name="statut" class="form-control">
            <option value="ouvert">Ouvert</option>
            <option value="fermé">Fermé</option>
        </select>
    </div>

    <div class="form-group">
        <label for="lundi">Lundi</label>
        <input type="text" class="form-control" name="lundi">
    </div>

    <div class="form-group">
        <label for="mardi">Mardi</label>
        <input type="text" class="form-control" name="mardi">
    </div>

    <div class="form-group">
        <label for="mercredi">Mercredi</label>
        <input type="text" class="form-control" name="mercredi">
    </div>

    <div class="form-group">
        <label for="jeudi">Jeudi</label>
        <input type="text" class="form-control" name="jeudi">
    </div>

    <div class="form-group">
        <label for="vendredi">Vendredi</label>
        <input type="text" class="form-control" name="vendredi">
    </div>

    <div class="form-group">
        <label for="samedi">Samedi</label>
        <input type="text" class="form-control" name="samedi">
    </div>

    <div class="form-group">
        <label for="dimanche">Dimanche</label>
        <input type="text" class="form-control" name="dimanche">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_horaires" value="Publier">
    </div>
</form>