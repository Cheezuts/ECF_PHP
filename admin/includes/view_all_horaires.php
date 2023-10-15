<div class="table-responsive">
    <form action="" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <select name="bulk_options" id="bulk_options" class="form-control">
                        <option value="">Sélectionnez une option</option>
                        <option value="delete">Supprimer</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Appliquer">
                    <a class="btn btn-primary" href="horaires.php?source=add_horaires">Ajouter un horaire</a>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover">
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

                while ($row = mysqli_fetch_assoc($select_horaires)) {
                    $id = $row['id'];
                    $statut = escape($row['statut']);
                    $lundi = escape($row['lundi']);
                    $mardi = escape($row['mardi']);
                    $mercredi = escape($row['mercredi']);
                    $jeudi = escape($row['jeudi']);
                    $vendredi = escape($row['vendredi']);
                    $samedi = escape($row['samedi']);
                    $dimanche = escape($row['dimanche']);

                    echo "<tr>";
                    echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$id'></td>";
                    echo "<td>$id</td>";
                    echo "<td>$statut</td>";
                    echo "<td>$lundi</td>";
                    echo "<td>$mardi</td>";
                    echo "<td>$mercredi</td>";
                    echo "<td>$jeudi</td>";
                    echo "<td>$vendredi</td>";
                    echo "<td>$samedi</td>";
                    echo "<td>$dimanche</td>";
                    echo "<td class='text-center'><a href='horaires.php?source=edit_horaires&id=$id'><i class='fa-solid fa-pen fa-2x'></i></a></td>";
                    echo "<td class='text-center'><a onClick=\"javascript: return confirm('Êtes-vous sûr de vouloir supprimer ?')\" href='horaires.php?delete=$id'><i class='fa-solid fa-trash text-danger fa-2x'></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </form>
</div>

<?php
if (isset($_GET['delete'])) {
    $the_id = escape($_GET['delete']);
    $query = "DELETE FROM horaires_semaine WHERE id = " . escape($the_id);
    $delete_query = mysqli_query($connection, $query);
    header("Location: horaires.php");
}
?>