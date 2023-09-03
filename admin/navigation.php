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
                            Bienvenue dans l'administration
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">

                        <?php insert_navigation(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nav_titre">Ajouter un menu de navigation</label>
                                    <input class="form-control" type="text" name="nav_titre">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                            <?php // UPDATE AND INCLUDE QUERY
                            
                            if(isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                include "includes/update_navigation.php";
                            }

                            ?>




                        </div>

                        <div class="col-xs-6">

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Menu</th>
                                        <th>Editer</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <!-- FIND ALL navigation QUERY -->
                                <?php findAllnavigation(); ?>

                                <!-- DELETE QUERY  -->
                                <?php deletenavigation(); ?>

                                </tbody>
                            </table>
                        </div>
                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        <?php include "includes/admin_footer.php"; ?>