<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Accueil</a>
                <!-- 		<i class="fas fa-home"></i> -->
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php 

                $query = "SELECT * FROM navigation";
                $select_all_navigation_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_navigation_query)) {
                    $nav_titre = $row['nav_titre'];
                    echo "<li><a href='#'>{$nav_titre}</a></li>";
                }
                
                ?>
                
                <li><a href="voitures.php">VOITUREUH</a></li>
                <li><a href="commentaires.php">Commentaires</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="admin">Admin</a></li>

                <!-- Lien if connected -->
<?php 
if(!isset($_SESSION['user_email'])) {
    if(isset($_GET['id'])) {
        $the_voiture_id = $_GET['id'];
        echo $the_voiture_id;
        echo "<li><a href='admin/voitures.php?source=edit_voitures&p_id={$the_voiture_id}'>Modifier</a></li>";
    }
}
?>
                <!-- Lien if connected -->
                
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>