<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>



<!-- Page Content -->
<div class="content-wrapper">

    <h1 class="text-center">Résultats de recherche</h1>

    <div class="row p-2 m-2 justify-content-center">

        <?php
        if(isset($_POST['submit'])) {
            $search = $_POST['search'];

            $query = "SELECT * FROM voitures WHERE marque LIKE '%$search%' OR modele LIKE '%$search%' OR annee_mise_en_circulation LIKE '%$search%' OR carburant LIKE '%$search%' OR kilometrage LIKE '%$search%' OR prix LIKE '%$search%'";
            $query_search = mysqli_query($connection, $query);

            if(!$query_search) {
                die("ERREUR DE REQUÊTE" . mysqli_error($connection));
            }

            $count = mysqli_num_rows($query_search);
            if($count == 0) {
                echo "<h3 class='text-center'>Aucun résultat trouvé</h3>";
            } else {
                while ($row = mysqli_fetch_assoc($query_search)) {
                    $voiture_id = $row['voiture_id'];
                    $marque = $row['marque'];
                    $modele = $row['modele'];
                    $annee = $row['annee_mise_en_circulation'];
                    $carburant = $row['carburant'];
                    $kilometrage = $row['kilometrage'];
                    $prix = $row['prix'];
                    $image = $row['image'];
                    ?>

                    <div class="col-6 col-md-4 col-lg-3 d-flex justify-content-between" style="margin: 20px;">
                        <div class="card text-center" style="width: 45rem;">
                            <img class="card-img-top p-2 m-2 img-fluid" src="images/<?php echo $image; ?>" style="width: 100%; height: 15vw; object-fit: cover;">
                            <div class="card-header p-2 m-2">
                                <h3><?php echo $marque . ' ' . $modele; ?></h3>
                            </div>
                            <div class="card-body p-2 m-2 text-center">
                                <p>Année: <?php echo $annee; ?></p>
                                <p>Carburant: <?php echo $carburant; ?></p>
                                <p>Kilométrage: <?php echo $kilometrage; ?> km</p>
                                <p>Prix: <?php echo $prix; ?></p>
                                <div class="card-footer text-center d-flex justify-content-center p-2">
                                    <a href="details.php?id=<?php echo $voiture_id; ?>" class="btn btn-primary">Détails</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
        }
        ?>

    </div>
</div>

<?php include "includes/footer.php" ?>