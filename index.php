<?php
include "includes/db.php";
include "includes/header.php"; 
?>

    <!-- Navigation -->
<?php 
include "includes/navigation.php";
?>


    <!-- Page Content -->
    <div class="container-fluid">

<div class="row">

    <div class="col-md-3 col-md-push-8 col-sm-12">

    <!-- Formulaire de connexion -->
    <div class="well">
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
        <!-- Votre formulaire de connexion ici -->
    </div>
    </div>

    </div>

    <div class="row">

    <div class="col-md-8 col-md-offset-2 col-sm-12">

    <!-- Contenu -->
    <div class="well">
        <!-- Votre contenu ici -->

        <?php 

            $per_page = 3;

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "";
            }

            if ($page == "" || $page == 1) {
                $page_1 = 0;
            } else {
                $page_1 = ($page * $per_page) - $per_page;
            }
            

            $select_serv_count = "SELECT * FROM services";
            $serv_count_query = mysqli_query($connection, $select_serv_count);
            $total_services = mysqli_num_rows($serv_count_query);
            $count = ceil($total_services / $per_page);                                 // Calculer le nombre total de pages

            if ($count == 0) {
                echo "<h1 class='text-center'>Aucun service disponible</h1>";
            } else {
                echo "<h1 class='text-center'>Nos services</h1>";
            }

            $query = "SELECT * FROM services LIMIT $page_1, $per_page";
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

            <img class="img-responsive center-block" src="images/<?php echo $serv_image ?>" alt="">

            <hr>
            <p><?php echo $serv_contenu ?></p>
            <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->
            <hr>

            <?php 
            }
            ?>  
                
            <hr>
            <!-- Pagination -->

            <ul class="pager">

                <?php 

                for ($i = 1; $i <= $count; $i++) {

                    if ($i == $page) {
                        echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                    } else {
                        echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                    }                
                }

                ?>
            </ul>
            


            <!-- Commentaires -->
            <h1 class="text-center">Avis : </h1>
            <!-- Posted Comments -->
            <?php 

            $query = "SELECT * FROM commentaires WHERE com_status = 'publier' LIMIT 4";
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
                <div class="rating"></div>
            </div>
            <?php

                
                
            }
            ?>

            
            
            </div>
            
        </div>
    </div>
</div>
</div>
<h2 class="text-center">Horaires</h2>
            <?php  include "includes/horaires.php" ?>
            <div>
                


    </div>    

<!-- Footer -->
        <?php include "includes/footer.php"; ?>