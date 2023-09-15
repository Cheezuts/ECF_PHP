<?php
if (isset($_GET['com_id'])) {
    $the_comment_id = escape($_GET['com_id']);
}

$query = "SELECT * FROM commentaires WHERE com_id = $the_comment_id";
$select_comment_by_id = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_comment_by_id)) {
    $com_nom = escape($row['com_nom']);
    $com_prenom = escape($row['com_prenom']);
    $com_commentaire = nl2br(escape($row['com_commentaire']));
    $com_note = escape($row['com_note']);
    $com_status = escape($row['com_status']);
}

if (isset($_POST['update_comment'])) {
    $com_nom = escape($_POST['com_nom']);
    $com_prenom = escape($_POST['com_prenom']);
    $com_commentaire = nl2br(escape($_POST['com_commentaire']));
    $com_note = escape($_POST['com_note']);
    $com_status = escape($_POST['com_status']);

    $query = "UPDATE commentaires SET ";
    $query .= "com_nom = '{$com_nom}', ";
    $query .= "com_prenom = '{$com_prenom}', ";
    $query .= "com_commentaire = '{$com_commentaire}', ";
    $query .= "com_note = '{$com_note}', ";
    $query .= "com_status = '{$com_status}' ";
    $query .= "WHERE com_id = {$the_comment_id} ";

    $update_comment = mysqli_query($connection, $query);

    confirmQuery($update_comment);

    header("Location: commentaires.php");
}
?>

<form action="" method="post">
    <div class="form-group">
        <label for="com_nom">Nom</label>
        <input value="<?php echo $com_nom; ?>" type="text" class="form-control" name="com_nom">
    </div>

    <div class="form-group">
        <label for="com_prenom">Prénom</label>
        <input value="<?php echo $com_prenom; ?>" type="text" class="form-control" name="com_prenom">
    </div>

    <div class="form-group">
        <label for="com_commentaire">Commentaire</label>
        <textarea class="form-control" name="com_commentaire" cols="30" rows="10"><?php echo $com_commentaire; ?></textarea>
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
        <input class="btn btn-primary" type="submit" name="update_comment" value="Éditer">
    </div>
</form>