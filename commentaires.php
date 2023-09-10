
<div class="container">
    <?php
    include "includes/db.php";
    include "includes/header.php";
    include "includes/navigation.php";
    ?>


    <?php
    
    if(isset($_POST['create_comment'])) {
        $com_nom = $_POST['com_nom'];
        $com_prenom = $_POST['com_prenom'];
        $com_commentaire = nl2br($_POST['com_commentaire']);
        $com_note = $_POST['com_note'];

        if(!empty($com_nom) && !empty($com_prenom) && !empty($com_commentaire) && !empty($com_note)){
            $com_nom = mysqli_real_escape_string($connection, $com_nom);
            $com_prenom = mysqli_real_escape_string($connection, $com_prenom);
            $com_commentaire = mysqli_real_escape_string($connection, $com_commentaire);
            $com_note = mysqli_real_escape_string($connection, $com_note);
        } else {
            echo "<script>alert('Tous les champs doivent être remplis')</script>";

        }

    
        $query = "INSERT INTO commentaires (com_nom, com_prenom, com_commentaire, com_note, com_status) ";
        $query .= "VALUES ('{$com_nom}', '{$com_prenom}', '{$com_commentaire}', '{$com_note}', 'masquer') ";
    
        $create_comment_query = mysqli_query($connection, $query);
    
        if(!$create_comment_query) {
            die('QUERY FAILED' . mysqli_error($connection));
        }    
    }  
    ?>

<!-- Page Content -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4 class="text-center">Laissez un commentaire :</h4>
    
            <form action="" method="post" role="form" class="form">
    
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" class="form-control" id="nom" name="com_nom" placeholder="Votre nom">                
                </div>
    
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" class="form-control" id="prenom" name="com_prenom" placeholder="Votre prénom">
                </div>
    
                <div class="form-group">
                    <label for="commentaire">Commentaire :</label>
                    <textarea class="form-control" id="commentaire" name="com_commentaire" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="note">Note :</label>
                    <select class="form-control" id="note" name="com_note">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <button type="submit" name="create_comment" class="btn btn-primary">Envoyer</button>
    
            </form>
        </div>
    </div>

<h2 class="text-center">Horaires</h2>
<?php include "includes/horaires.php" ?>

<hr>

<!-- Footer -->
<?php include "includes/footer.php"; ?>

</div>