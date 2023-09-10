<?php 
if(isset($_POST['checkBoxArray'])) {
    foreach($_POST['checkBoxArray'] as $checkBoxValue) {
        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options) {
            case 'delete':
                $query = "DELETE FROM horaires_semaine WHERE id = {$checkBoxValue} ";
                $update_to_delete_status = mysqli_query($connection, $query);
                confirmQuery($update_to_delete_status);
                break;
        }
    }
}
?>

<form action="" method="post">
<table class="table table-bordered table-hover">

<div id="bulkOptionsContainer" class="col-xs-4">
        <select name="bulk_options" id="bulk_options" class="form-control">
            <option value="">Selectionnez une option</option>
            <option value="delete">Supprimer</option>
        </select>
</div>

<div class="col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Appliquer">
    <a class="btn btn-primary" href="horaires.php?source=add_horaires">Ajouter un horaire</a>
</div>

    <thead>
        <tr>
        <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Id</th>
            <th>Statut</th>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
            <th>Samedi</th>
            <th>Dimanche</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $query = "SELECT * FROM horaires_semaine";
        $select_horaires = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_horaires)) {
            $id = $row['id'];
            $statut = $row['statut'];
            $lundi = $row['lundi'];
            $mardi = $row['mardi'];
            $mercredi = $row['mercredi'];
            $jeudi = $row['jeudi'];
            $vendredi = $row['vendredi'];
            $samedi = $row['samedi'];
            $dimanche = $row['dimanche'];

            echo "<tr>";
            ?>

            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $id ?>'></td>

            <?php
            echo "<td>$id</td>";
            echo "<td>$statut</td>";
            echo "<td>$lundi</td>";
            echo "<td>$mardi</td>";
            echo "<td>$mercredi</td>";
            echo "<td>$jeudi</td>";
            echo "<td>$vendredi</td>";
            echo "<td>$samedi</td>";
            echo "<td>$dimanche</td>";
            echo "<td class='text-center'><a href='horaires.php?source=edit_horaires&id={$id}'><i class='fa-solid fa-pen fa-2x'></a></td>";
            echo "<td class='text-center'><a href='horaires.php?delete={$id}'><i class='fa-solid fa-trash text-danger fa-2x'></a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</form>

<?php
if(isset($_GET['delete'])) {
    $the_id = $_GET['delete'];
    $query = "DELETE FROM horaires_semaine WHERE id = {$the_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: horaires.php");
}
?>