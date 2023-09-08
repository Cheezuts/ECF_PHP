<?php
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
?>

<!-- Page Content -->
<div class="container">
    
</div>
<div class="content-wrapper">

    <h1 class="text-center">Nos Voitures</h1>

    <div class="row text-center">
    <form action="recherche.php" method="POST" class="search-form">
        <input type="text" class="search-input" name="search" placeholder="Rechercher une voiture...">
        <button type="submit" name="submit" class="search-button">Rechercher</button>
    </form>
    </div>

    <div class="row p-2 m-2 justify-content-center align-items-center">

    

        <?php
        $query = "SELECT * FROM voitures";
        $select_all_cars_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_cars_query)) {
            $voiture_id = $row['voiture_id'];
            $marque = $row['marque'];
            $modele = $row['modele'];
            $annee = $row['annee_mise_en_circulation'];
            $carburant = $row['carburant'];
            $kilometrage = $row['kilometrage'];
            $prix = $row['prix'];
            $image = $row['image'];
        ?>

            <div class="col-xs-12 col-6 col-md-4 col-lg-3 d-flex justify-content-between text-center" >
                <div class="panel panel-default text-center" style="max-width: 400px; margin: 10px;">
                    <img class="card-img-top p-2 m-2 img-fluid" src="images/<?php echo $image; ?>" style="width: 100%; height: 15vw; object-fit: cover;">
                    <div class="panel-heading p-2 m-2">
                        <h3 class="panel-title"><?php echo $marque . ' ' . $modele; ?></h3>
                    </div>
                    <div class="panel-body p-2 m-2">
                        <p>Année: <?php echo $annee; ?></p>
                        <p>Carburant: <?php echo $carburant; ?></p>
                        <p>Kilométrage: <?php echo $kilometrage; ?> km</p>
                        <p>Prix: <?php echo $prix; ?> €</p>
                        <div class="panel-footer text-center d-flex justify-content-center p-2">
                            <a href="details.php?id=<?php echo $voiture_id; ?>" class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

    </div>
</div>

<h2 class="text-center">Horaires</h2>
<?php include "includes/horaires.php" ?>

<hr>

<!-- Footer -->
<?php include "includes/footer.php"; ?>