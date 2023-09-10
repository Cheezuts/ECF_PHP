<?php 
if(isset($_POST['checkBoxArray'])) {
    foreach($_POST['checkBoxArray'] as $checkBoxValue) {
        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options) {
            case 'delete':
                $query = "DELETE FROM services WHERE serv_id = {$checkBoxValue} ";
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
        <a class="btn btn-primary" href="services.php?source=add_services">Ajouter un service</a>
    </div>
    
</div>
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
                    
                        while($row = mysqli_fetch_assoc($select_services)) {
                        $serv_id = $row['serv_id'];
                        $serv_titre = $row['serv_titre'];
                        $serv_image = $row['serv_image'];
                        $serv_contenu = $row['serv_contenu'];

                        echo "<tr>";
                        ?>

                        <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $serv_id ?>'></td>

                        <?php 

                        echo "<td>$serv_id</td>";
                        echo "<td>$serv_titre</td>";
                        echo "<td class='text-center'><img width='100' src='../images/$serv_image' alt='image'></td>";
                        echo "<td>$serv_contenu</td>";
                        echo "<td class='text-center'><a href='services.php?source=edit_services&p_id={$serv_id}'><i class='fa-solid fa-pen fa-2x'></a></td>";
                        echo "<td class='text-center'><a href='services.php?delete={$serv_id}'><i class='fa-solid fa-trash text-danger fa-2x'></a></td>";

                        echo "</tr>";

                        }
                        
                        ?>

                    </table>
                    </form>

                    <?php
                    
                    if(isset($_GET['delete'])) {
                        $the_serv_id = $_GET['delete'];
                        $query = "DELETE FROM services WHERE serv_id = {$the_serv_id} ";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: services.php");

                    }  

                    ?>