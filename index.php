<?php
include "includes/db.php";
include "includes/header.php"; 
?>

    <!-- Navigation -->
<?php 
include "includes/navigation.php";
?>

    <!-- Page Content -->
    <div class="container">
            <!-- Form login -->
            <div class="row">
                    <div class="col-md-4 col-md-offset-3 well">
                        <h4 class="text-center">Connection :</h4>
            
                        <form action="includes/login.php" method="post"class="form">            
                            <div class="form-group">
                                <input type="text" class="form-control" name="user_email" placeholder="Votre email">                
                            </div>
            
                            <div class="input-group">
                    <input name="user_password" type="password" class="form-control" placeholder="Mot de passe">
                    <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Envoyer
                    </button>
                    </span>
                </div>
            
                        </form>
                    </div>
            </div> 
            
            <!-- Fin form login -->

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                

            <?php 
            $query = "SELECT * FROM services";
            $select_all_services_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_services_query)) {
                $serv_image = $row['serv_image'];
                $serv_titre = $row['serv_titre'];
                $serv_contenu = $row['serv_contenu'];

            ?>

            <h1 class="page-header text-center">
                <?php echo $serv_titre ?>                    
            </h1>

            <!-- Service -->

            <hr>

            <img class="img-responsive" src="images/<?php echo $serv_image ?>" alt="">

            <hr>
            <p><?php echo $serv_contenu ?></p>
            <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
            <hr>

            <?php 
            }
            ?>  
                
            <hr>
            <h1 class="text-center">Commentaires : </h1>
            <!-- Posted Comments -->
<?php 

$query = "SELECT * FROM commentaires WHERE com_status = 'publier'";
$select_commentaires_query = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($select_commentaires_query)) {
    $com_nom = $row['com_nom'];
    $com_prenom = $row['com_prenom'];
    $com_commentaire = $row['com_commentaire'];
    $com_note = $row['com_note'];

    // Afficher les commentaires publiés
    ?>
<div class="well">
<?php
        // Boucle pour afficher les étoiles pleines
        for ($i = 1; $i <= $com_note; $i++) {
            echo '<i class="fas fa-star text-warning"></i>';
        }
        
        // Boucle pour afficher les étoiles vides (si nécessaire)
        for ($i = $com_note + 1; $i <= 5; $i++) {
            echo '<i class="far fa-star"></i>';
        }
        ?>
    <h4><?php echo $com_nom . ' ' . $com_prenom; ?></h4>
    <p><?php echo $com_commentaire; ?></p>
    <div class="rating">
        
    </div>
</div>
    <?php
}
?>


            <h2 class="text-center">Horaires</h2>
            <?php  include "includes/horaires.php" ?>
            <div>

            
            </div>

            
        </div>

        <!-- Footer -->
<?php include "includes/footer.php"; ?>