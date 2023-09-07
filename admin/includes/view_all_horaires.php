<table class="table table-bordered table-hover">
    <thead>
        <tr>
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

<?php
if(isset($_GET['delete'])) {
    $the_id = $_GET['delete'];
    $query = "DELETE FROM horaires_semaine WHERE id = {$the_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: horaires.php");
}
?>