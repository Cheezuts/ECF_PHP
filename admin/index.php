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
                            Bienvenue dans l'administation 
                            <small><?php echo $_SESSION['user_email'] ;?></small>
                        </h1>                        
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                
<div class="row">


<!-- compteur des services -->

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


        <?php 
        $query = "SELECT * FROM services";
        $select_all_services = mysqli_query($connection, $query);
        $services_counts = mysqli_num_rows($select_all_services);
        
        echo "<div class='huge'>{$services_counts}</div>"
        ?>

                        
                        <div class="text-bold">Services</div>
                    </div>
                </div>
            </div>
            <a href="services.php">
                <div class="panel-footer">
                    <span class="pull-left text-bold">Détails</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


<!-- compteur des commentaires -->

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

        <?php 
        $query = "SELECT * FROM commentaires";
        $select_all_commentaires = mysqli_query($connection, $query);
        $commentaires_counts = mysqli_num_rows($select_all_commentaires);
        
        echo "<div class='huge'>{$commentaires_counts}</div>"
        ?>

                    <div class="text-bold">Commentaires</div>
                    </div>
                </div>
            </div>
            <a href="commentaires.php">
                <div class="panel-footer">
                    <span class="pull-left text-bold">Détails</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <!-- compteur des utilisateurs -->

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

        <?php 
        $query = "SELECT * FROM admins";
        $select_all_admins = mysqli_query($connection, $query);
        $admins_counts = mysqli_num_rows($select_all_admins);
        
        echo "<div class='huge'>{$admins_counts}</div>"
        ?>

                        <div class="text-bold">Utilisateurs</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left text-bold">Détails</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <!-- compteur des navigations -->

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 
        $query = "SELECT * FROM navigation";
        $select_all_navigation = mysqli_query($connection, $query);
        $navigation_counts = mysqli_num_rows($select_all_navigation);
        
        echo "<div class='huge'>{$navigation_counts}</div>"
        ?>

                        <div class="text-bold">Navigation</div>
                    </div>
                </div>
            </div>
            <a href="navigation.php">
                <div class="panel-footer">
                    <span class="pull-left text-bold">Détails</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <!-- compteur des voitures -->

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa-solid fa-car fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 
        $query = "SELECT * FROM voitures";
        $select_all_voitures = mysqli_query($connection, $query);
        $voitures_counts = mysqli_num_rows($select_all_voitures);
        
        echo "<div class='huge'>{$voitures_counts}</div>"
        ?>

                        <div class="text-bold">Voitures</div>
                    </div>
                </div>
            </div>
            <a href="voitures.php">
                <div class="panel-footer">
                    <span class="pull-left text-bold">Détails</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    <!-- compteur des horaires -->

    <div class="col-lg-3 col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="glyphicon glyphicon-time fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <?php 
                    $query = "SELECT * FROM horaires_semaine";
                    $select_all_horaires = mysqli_query($connection, $query);
                    $horaires_counts = mysqli_num_rows($select_all_horaires);
                    
                    echo "<div class='huge'>{$horaires_counts}</div>";
                    ?>
                    <div class="text-bold">Horaires</div>
                </div>
            </div>
        </div>
        <a href="horaires.php">
            <div class="panel-footer">
                <span class="pull-left text-bold">Détails</span>
                <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
</div>

<!-- compteur des commentaires publier -->
<?php 
$query = "SELECT * FROM commentaires WHERE com_status = 'publier'";
$select_all_commentaires_publier = mysqli_query($connection, $query);
$commentaires_publier_counts = mysqli_num_rows($select_all_commentaires_publier);
?>
<!-- compteur des commentaires masqué -->
<?php 
$query = "SELECT * FROM commentaires WHERE com_status = 'masquer'";
$select_all_commentaires_masquer = mysqli_query($connection, $query);
$commentaires_masquer_counts = mysqli_num_rows($select_all_commentaires_masquer);
?>

                <!-- /.row -->
                <div class="row">
    <div class="col-xs-12">
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['', ''],

                    <?php
                    $element_text = ['Services', 'Commentaires','publier','masqué', 'Utilisateurs', 'Navigation', 'Voitures'];
                    $element_count = [$services_counts, $commentaires_counts, $commentaires_publier_counts, $commentaires_masquer_counts, $admins_counts, $navigation_counts, $voitures_counts];

                    for($i = 0; $i < 7; $i++) {

                        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";

                    }

                    ?>


                // ['Posts', 1000,],
                ]);

                var options = {
                    chart: {
                        title: '',
                        subtitle: '',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
        <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
    </div>
</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <style>
            .text-bold {
            font-weight: bold;
            }   
        </style>


        <?php include "includes/admin_footer.php"; ?>