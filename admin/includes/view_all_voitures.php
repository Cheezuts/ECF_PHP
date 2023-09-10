<?php 
if(isset($_POST['checkBoxArray'])) {
    foreach($_POST['checkBoxArray'] as $voitureValueId) {
        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options) {
            case 'delete':
                $query = "DELETE FROM voitures WHERE voiture_id = {$voitureValueId} ";
                $delete_query = mysqli_query($connection, $query);
                header("Location: voitures.php");
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
    <a class="btn btn-primary" href="voitures.php?source=add_voitures">Ajouter une voiture</a>
</div>

                        <thead>
                            <tr>
                            <th><input id="selectAllBoxes" type="checkbox"></th>
                                <th>Id</th>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Année</th>
                                <th>Carburant</th>
                                <th>Kilométrage</th>
                                <th>Prix</th>
                                <th>Description</th>
                                <th>Couverture</th>
                                <th>Photos</th>
                                <th>Voir le véhicule</th>
                                <th>Editer</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>

                        <tbody>


<?php
        $query = "SELECT * FROM voitures";
        $select_voitures = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_voitures)) {
            $voiture_id = $row['voiture_id'];
            $marque = $row['marque'];
            $modele = $row['modele'];
            $annee = $row['annee_mise_en_circulation'];
            $carburant = $row['carburant'];
            $kilometrage = $row['kilometrage'];
            $prix = $row['prix'];
            $description = $row['description'];
            $image = $row['image'];
            $photos = $row['photos'];
        
            echo "<tr>";
            ?>

            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $voiture_id ?>'></td>

            <?php
            echo "<td>$voiture_id</td>";
            echo "<td>$marque</td>";
            echo "<td>$modele</td>";
            echo "<td>$annee</td>";
            echo "<td>$carburant</td>";
            echo "<td>$kilometrage</td>";
            echo "<td>$prix</td>";
            echo "<td>$description</td>";
            echo "<td class='text-center'><img width='100' src='../images/$image' alt='image'></td>";
            echo "<td class='text-center'><img width='100' src='../images/$photos' alt='image'></td>";
            echo "<td class='text-center'><a href='../details.php?id={$voiture_id}'><i class='fa-solid fa-eye fa-2x'></i></a></td>";
            echo "<td class='text-center'><a href='voitures.php?source=edit_voitures&p_id={$voiture_id}'><i class='fa-solid fa-pen fa-2x'></i></a></td>";
            echo "<td class='text-center'><a href='voitures.php?delete={$voiture_id}'><i class='fa-solid fa-trash text-danger fa-2x'></i></a></td>";
            echo "</tr>";
        }
?>

                    </table>
                    </form>

                    <?php
                    
                    if(isset($_GET['delete'])) {
                        $the_voiture_id = $_GET['delete'];
                        $query = "DELETE FROM voitures WHERE voiture_id = {$the_voiture_id} ";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: voitures.php");

                    }  

                    ?>