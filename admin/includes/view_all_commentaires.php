<?php
if (isset($_POST['apply'])) {
    $bulk_options = $_POST['bulk_options'];

    foreach ($_POST['checkboxArray'] as $com_id) {
        switch ($bulk_options) {
            case 'publier':
                $query = "UPDATE commentaires SET com_status = 'publier' WHERE com_id = $com_id ";
                $publier_commentaires_query = mysqli_query($connection, $query);
                break;

            case 'masquer':
                $query = "UPDATE commentaires SET com_status = 'masquer' WHERE com_id = $com_id ";
                $masquer_commentaires_query = mysqli_query($connection, $query);
                break;

            case 'supprimer':
                $query = "DELETE FROM commentaires WHERE com_id = $com_id ";
                $delete_commentaires_query = mysqli_query($connection, $query);
                break;
        }
    }

    // Redirection vers la page des commentaires après l'application de l'action
    header("Location: commentaires.php");
}
?>

<table class="table table-bordered table-hover">

    <div id="bulkOptionsContainer" class="col-xs-4">
        <form action="" method="post">
            <select name="bulk_options" id="bulk_options" class="form-control">
                <option value="">Selectionnez une option</option>
                <option value="publier">Publier</option>
                <option value="masquer">Masquer</option>
                <option value="supprimer">Supprimer</option>
            </select>
    </div>

    <div class="col-xs-4">
        <input type="submit" name="apply" class="btn btn-success" value="Appliquer">
        <a class="btn btn-primary" href="commentaires.php?source=add_commentaires">Ajouter un commentaire</a>
    </div>

                        <thead>
                            <tr>
                            <th><input id="selectAllBoxes" type="checkbox"></th>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Commentaire</th>
                                <th>Note</th>
                                <th>Statut</th>
                                <th>Publier</th> 
                                <th>Masquer</th> 
                                <th>Editer</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php 
                        $query = "SELECT * FROM commentaires";
                        $select_commentaires = mysqli_query($connection, $query);
                    
                        while($row = mysqli_fetch_assoc($select_commentaires)) {
                        $com_id = $row['com_id'];
                        $com_nom = $row['com_nom'];
                        $com_prenom = $row['com_prenom'];
                        $com_commentaire = $row['com_commentaire'];
                        $com_note = $row['com_note'];
                        $com_status = $row['com_status'];

                        echo "<tr>";
                        ?>

                        <td><input class='checkBoxes' type='checkbox' name='checkboxArray[]' value='<?php echo $com_id ?>'></td>

                        <?php
                        echo "<td>$com_id</td>";
                        echo "<td>$com_nom</td>";
                        echo "<td>$com_prenom</td>";
                        echo "<td>$com_commentaire</td>";
                        echo "<td>$com_note</td>";
                        echo "<td>$com_status</td>";
                        echo "<td class='text-center'><a href='commentaires.php?publier={$com_id}'><i class='fa-regular fa-thumbs-up fa-2x text-success'></a></td>";
                        echo "<td class='text-center'><a href='commentaires.php?masquer={$com_id}'><i class='fa-regular fa-thumbs-down text-danger fa-2x'></a></td>";
                        echo "<td class='text-center'><a href='commentaires.php?source=edit_commentaires&com_id={$com_id}'><i class='fa-solid fa-pen fa-2x'></a></td>";
                        echo "<td class='text-center'><a onClick=\"javascript: return confirm('etes vous sur de vouloir supprimer ?')\" href='commentaires.php?delete={$com_id}'><i class='fa-solid fa-trash text-danger fa-2x'></a></td>";

                        echo "</tr>";

                        }
                        
                        ?>

                    </table>


                    <!-- Approuver un commentaire -->
                    <?php 
                    if(isset($_GET['publier'])) {
                        $the_com_id = $_GET['publier'];
                        $query = "UPDATE commentaires SET com_status = 'publier' WHERE com_id = $the_com_id ";
                        $publier_commentaires_query = mysqli_query($connection, $query);
                        header("Location: commentaires.php");
                    }

                    
                    
                    ?>

                    <!-- Désapprouver un commentaire -->
                    <?php 
                    if(isset($_GET['masquer'])) {
                        $the_com_id = $_GET['masquer'];
                        $query = "UPDATE commentaires SET com_status = 'masquer' WHERE com_id = $the_com_id ";
                        $masquer_commentaires_query = mysqli_query($connection, $query);
                        header("Location: commentaires.php");
                    }
                    ?>  

                    <!-- Supprimer un commentaire -->
                    <?php
                    
                    if(isset($_GET['delete'])) {
                        $the_com_id = $_GET['delete'];
                        $query = "DELETE FROM commentaires WHERE com_id = {$the_com_id} ";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: commentaires.php");

                    }  

                    ?>