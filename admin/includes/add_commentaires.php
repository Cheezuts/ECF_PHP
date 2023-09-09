<?php
if (isset($_POST['add_comment'])) {
    $com_nom = $_POST['com_nom'];
    $com_prenom = $_POST['com_prenom'];
    $com_commentaire = nl2br($_POST['com_commentaire']);
    $com_note = $_POST['com_note'];
    $com_status = $_POST['com_status'];

    $query = "INSERT INTO commentaires (com_nom, com_prenom, com_commentaire, com_note, com_status) ";
    $query .= "VALUES ('{$com_nom}', '{$com_prenom}', '{$com_commentaire}', '{$com_note}', '{$com_status}') ";

    $add_comment = mysqli_query($connection, $query);

    confirmQuery($add_comment);

    header("Location: commentaires.php");
}
?>

<form action="" method="post">
    <div class="form-group">
        <label for="com_nom">Nom</label>
        <input type="text" class="form-control" name="com_nom">
    </div>

    <div class="form-group">
        <label for="com_prenom">Prénom</label>
        <input type="text" class="form-control" name="com_prenom">
    </div>

    <div class="form-group">
        <label for="com_commentaire">Commentaire</label>
        <textarea class="form-control" name="com_commentaire" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label for="com_note">Note</label>
        <input type="number" class="form-control" name="com_note" min="1" max="5">
    </div>

    <div class="form-group">
        <label for="com_status">Statut</label>
        <select name="com_status" class="form-control">
            <option value="masquer">Masquer</option>
            <option value="publier">Publier</option>
        </select>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_comment" value="Ajouter">
    </div>
</form>