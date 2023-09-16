<?php include "includes/admin_header.php"; ?>

<?php 

// Vérification si l'utilisateur est administrateur
if (!is_admin($_SESSION['user_email'])) {
    // Redirection vers la page index.php avec un message d'avertissement
    header("Location: index.php?message=not_authorized");
    exit; // Arrêt de l'exécution du script pour éviter toute autre sortie indésirable
}

?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Gestion des utilisateurs
                            <small><?php echo $_SESSION['user_email'] ;?></small>
                    </h1>

                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_users';
                            include "includes/add_users.php";
                            break;
                        case 'edit_users';
                            include "includes/edit_users.php";
                            break;
                        default:
                            include "includes/view_all_users.php";
                            break;
                    }

                    ?>
                    

                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        <?php include "includes/admin_footer.php"; ?>