<?php
if (isset($_POST['add_comment'])) {
    $com_nom = escape($_POST['com_nom']);
    $com_prenom = escape($_POST['com_prenom']);
    $com_commentaire = nl2br(escape($_POST['com_commentaire']));
    $com_note = escape($_POST['com_note']);
    $com_status = escape($_POST['com_status']);

    $errors = [];

    // Validation des champs
    if (empty($com_nom) || empty($com_prenom) || empty($com_commentaire) || empty($com_status) || empty($com_note) || $com_note < 1 || $com_note > 5) {
        if (empty($com_nom)) {
            $errors[] = "Le champ 'Nom' est obligatoire.";
        }

        if (empty($com_prenom)) {
            $errors[] = "Le champ 'Prénom' est obligatoire.";
        }

        if (empty($com_commentaire)) {
            $errors[] = "Le champ 'Commentaire' est obligatoire.";
        }

        if (empty($com_note) || $com_note < 1 || $com_note > 5) {
            $errors[] = "La note doit être comprise entre 1 et 5.";
        }

        if (empty($com_status)) {
            $errors[] = "Le champ 'Statut' est obligatoire.";
        }

        // Afficher les messages d'erreur
        echo "<div class='alert alert-warning text-center'>";
        foreach ($errors as $error) {
            echo "<p><strong>$error</strong></p>";
        }
        echo "</div>";
    } else {
        $query = "INSERT INTO commentaires (com_nom, com_prenom, com_commentaire, com_note, com_status) ";
        $query .= "VALUES ('{$com_nom}', '{$com_prenom}', '{$com_commentaire}', '{$com_note}', '{$com_status}') ";

        $add_comment = mysqli_query($connection, $query);

        confirmQuery($add_comment);

        header("Location: commentaires.php");
    }
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
        <select name="com_note" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
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