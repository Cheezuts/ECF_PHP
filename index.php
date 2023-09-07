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

            <h2 class="text-center">Horaires</h2>
            <?php  include "includes/horaires.php" ?>
            <div>

            
            </div>
            
        </div>

        <!-- <?php include "includes/recherche.php"; ?> -->

        <hr>   


        <!-- Footer -->
<?php include "includes/footer.php"; ?>

