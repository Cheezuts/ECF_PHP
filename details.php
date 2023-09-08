<?php
include "includes/db.php";
include "includes/header.php";
?>

<!-- Navigation -->
<?php 
include "includes/navigation.php";
?>

<div class="container">
    <h1 class="text-center">Détails du véhicule</h1>

    <div class="row">
        <?php
        // Vérifier si l'ID du véhicule est présent dans l'URL
        if (isset($_GET['id'])) {
            $voiture_id = $_GET['id'];

            // Récupérer les détails du véhicule à partir de la base de données
            $query = "SELECT * FROM voitures WHERE voiture_id = $voiture_id";
            $select_car_query = mysqli_query($connection, $query);

            if ($row = mysqli_fetch_assoc($select_car_query)) {
                $marque = $row['marque'];
                $modele = $row['modele'];
                $annee = $row['annee_mise_en_circulation'];
                $carburant = $row['carburant'];
                $kilometrage = $row['kilometrage'];
                $prix = $row['prix'];
                $description = $row['description'];
                $image = $row['image'];
                $photos = $row['photos'];
        ?>

        <div class="col-md-6 col-md-offset-3">
            <img src="images/<?php echo $image; ?>" alt="Photo de la voiture" class="img-responsive center-block">

            <h2 class="text-center"><?php echo $marque . ' ' . $modele; ?></h2>
            <p class="text-center">Année : <?php echo $annee; ?></p>
            <p class="text-center">Carburant : <?php echo $carburant; ?></p>
            <p class="text-center">Kilométrage : <?php echo $kilometrage; ?> km</p>
            <p class="text-center">Prix : <?php echo $prix; ?></p>
            <p class="text-center">Description : <br> <?php echo nl2br($description) ; ?></p>

            
            <!-- style carousel -->
            <style>
            .carousel-image {
                max-height: 300px; /* Définissez ici la hauteur fixe souhaitée */
                display: block;
                margin: 0 auto;
            }
            </style>
            
            <!-- Afficher les photos de la voiture -->

            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicateurs -->
                <ol class="carousel-indicators">
                    <?php
                    $photoList = explode(',', $photos);
                    $numPhotos = count($photoList);

                    for ($i = 0; $i < $numPhotos; $i++) {
                        $active = ($i == 0) ? 'active' : '';
                        echo '<li data-target="#imageCarousel" data-slide-to="' . $i . '" class="' . $active . '"></li>';
                    }
                    ?>
                </ol>


                <!-- Afficher les photos de la voiture dans un carousel -->
                <div class="carousel-inner">
                    <?php
                    for ($i = 0; $i < $numPhotos; $i++) {
                        $active = ($i == 0) ? 'active' : '';
                    ?>
                    <div class="item <?php echo $active; ?>">
                        <img class="carousel-image" src="images/<?php echo $photoList[$i]; ?>" alt="Image <?php echo $i + 1; ?>">
                        <div class="carousel-caption">
                            <h3>Image <?php echo $i + 1; ?></h3>
                            <p>Description de l'image <?php echo $i + 1; ?></p>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <!-- Contrôles -->
                <a class="left carousel-control" href="#imageCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#imageCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>

        <?php
            } else {
                // Aucun véhicule trouvé pour l'ID spécifié
                echo "<p class='text-center'>Aucun véhicule trouvé pour cet ID.</p>";
            }
        } else {
            // L'ID du véhicule n'est pas spécifié dans l'URL
            echo "<p class='text-center'>Aucun ID de véhicule spécifié.</p>";
        }
        ?>
    </div>
</div>

<?php
include "includes/footer.php";
?>