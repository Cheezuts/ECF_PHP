<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Gestion des horaires
                            <small><?php echo $_SESSION['user_email'] ;?></small>
                    </h1>

                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_horaires';
                            include "includes/add_horaires.php";
                            break;
                        case 'edit_horaires';
                            include "includes/edit_horaires.php";
                            break;
                        default:
                            include "includes/view_all_horaires.php";
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