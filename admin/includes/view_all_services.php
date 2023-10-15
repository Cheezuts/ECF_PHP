<div class="table-responsive">
    <form action="" method="post">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <select name="bulk_options" id="bulk_options" class="form-control">
                        <option value="">Selectionnez une option</option>
                        <option value="delete">Supprimer</option>
                        <option value="clone">Cloner</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Appliquer">
                    <a class="btn btn-primary" href="services.php?source=add_services">Ajouter un service</a>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><input id="selectAllBoxes" type="checkbox"></th>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Image</th>
                        <th>Contenu</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM services";
                    $select_services = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_services)) {
                        $serv_id = escape($row['serv_id']);
                        $serv_titre = escape($row['serv_titre']);
                        $serv_image = escape($row['serv_image']);
                        $serv_contenu = escape($row['serv_contenu']);
                        $truncated_contenu = strlen($serv_contenu) > 15 ? substr($serv_contenu, 0, 50) . '...' : $serv_contenu;

                        echo "<tr>";
                        echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$serv_id'></td>";
                        echo "<td>$serv_id</td>";
                        echo "<td>$serv_titre</td>";
                        echo "<td class='text-center'><img class='img-responsive' width='100' src='../images/$serv_image' alt='image'></td>";
                        echo "<td>$truncated_contenu</td>";
                        echo "<td class='text-center'><a href='services.php?source=edit_services&p_id=$serv_id'><i class='fa-solid fa-pen fa-2x'></i></a></td>";
                        echo "<td class='text-center'><a onClick=\"javascript: return confirm('etes vous sur de vouloir supprimer ?')\" href='services.php?delete=$serv_id'><i class='fa-solid fa-trash text-danger fa-2x'></i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<?php
if (isset($_GET['delete'])) {
    $the_serv_id = escape($_GET['delete']);
    $query = "DELETE FROM services WHERE serv_id = " . escape($the_serv_id);
    $delete_query = mysqli_query($connection, $query);
    header("Location: services.php");
}
?>