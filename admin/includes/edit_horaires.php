<?php
if (isset($_GET['source']) && $_GET['source'] === 'edit_horaires') {
    $the_id = escape($_GET['id']);

    if (isset($_POST['update_horaires'])) {
        $statut = escape($_POST['statut']);
        $lundi = escape($_POST['lundi']);
        $mardi = escape($_POST['mardi']);
        $mercredi = escape($_POST['mercredi']);
        $jeudi = escape($_POST['jeudi']);
        $vendredi = escape($_POST['vendredi']);
        $samedi = escape($_POST['samedi']);
        $dimanche = escape($_POST['dimanche']);

        $query = "UPDATE horaires_semaine SET ";
        $query .= "statut = '{$statut}', ";
        $query .= "lundi = '{$lundi}', ";
        $query .= "mardi = '{$mardi}', ";
        $query .= "mercredi = '{$mercredi}', ";
        $query .= "jeudi = '{$jeudi}', ";
        $query .= "vendredi = '{$vendredi}', ";
        $query .= "samedi = '{$samedi}', ";
        $query .= "dimanche = '{$dimanche}' ";
        $query .= "WHERE id = {$the_id}";

        $update_horaires_query = mysqli_query($connection, $query);

        confirmQuery($update_horaires_query);

        echo "<p class='bg-success'>Horaires mis à jour ! <a href='horaires.php'>Retour à toutes les horaires</a> ou retourner à l'<a href='index.php'>ACCUEIL</a></p>";
    }

    $query = "SELECT * FROM horaires_semaine WHERE id = {$the_id}";
    $select_horaires_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_horaires_by_id)) {
        $id = $row['id'];
        $statut = escape($row['statut']);
        $lundi = escape($row['lundi']);
        $mardi = escape($row['mardi']);
        $mercredi = escape($row['mercredi']);
        $jeudi = escape($row['jeudi']);
        $vendredi = escape($row['vendredi']);
        $samedi = escape($row['samedi']);
        $dimanche = escape($row['dimanche']);

        // Display the form to edit the horaires
        ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="statut">Statut</label>
                <input type="text" class="form-control" name="statut" value="<?php echo $statut; ?>">
            </div>
            <div class="form-group">
                <label for="lundi">Lundi</label>
                <input type="text" class="form-control" name="lundi" value="<?php echo $lundi; ?>">
            </div>
            <div class="form-group">
                <label for="mardi">Mardi</label>
                <input type="text" class="form-control" name="mardi" value="<?php echo $mardi; ?>">
            </div>
            <div class="form-group">
                <label for="mercredi">Mercredi</label>
                <input type="text" class="form-control" name="mercredi" value="<?php echo $mercredi; ?>">
            </div>
            <div class="form-group">
                <label for="jeudi">Jeudi</label>
                <input type="text" class="form-control" name="jeudi" value="<?php echo $jeudi; ?>">
            </div>
            <div class="form-group">
                <label for="vendredi">Vendredi</label>
                <input type="text" class="form-control" name="vendredi" value="<?php echo $vendredi; ?>">
            </div>
            <div class="form-group">
                <label for="samedi">Samedi</label>
                <input type="text" class="form-control" name="samedi" value="<?php echo $samedi; ?>">
            </div>
            <div class="form-group">
                <label for="dimanche">Dimanche</label>
                <input type="text" class="form-control" name="dimanche" value="<?php echo $dimanche; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update_horaires" value="Update Horaires">
            </div>
        </form>

        <?php
    }
}
?>