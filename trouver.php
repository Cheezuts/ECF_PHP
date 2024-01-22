<div class="container">
    <?php
    include "includes/db.php";
    include "includes/header.php";
    include "includes/navigation.php";
    ?>




    <!-- Page Content -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4 class="text-center">Nous trouver :</h4>
            <button id="showMapButton" class="btn btn-primary">Retrouvez notre agence ici !</button>
            <div id="map" class="mt-3" style="height: 300px;"></div>
        </div>
    </div>
    <script>
        // Fonction asynchrone pour charger l'API Google Maps
        async function loadGoogleMaps() {
            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = 'https://maps.google.com/maps/api/js?key=AIzaSyDwlfBW88oTr7vl4NK6KbDpqfn8Am_VD0w';
                script.async = true;
                script.defer = true;
                script.onload = resolve;
                script.onerror = reject;
                document.head.appendChild(script);
            });
        }

        // Fonction pour initialiser la carte Google
        function initMap() {
            const myLocation = {
                lat: 43.61053466796875,
                lng: 3.8743507862091064
            };

            const map = new google.maps.Map(document.getElementById('map'), {
                center: myLocation,
                zoom: 14
            });

            // Ajouter un marqueur à l'emplacement spécifié
            const marker = new google.maps.Marker({
                position: myLocation,
                map: map,
                title: 'My location'
            });
        }

        // Associer la fonction asynchrone à l'événement de clic du bouton
        document.getElementById('showMapButton').addEventListener('click', async () => {
            try { // Charger l'API Google Maps avant d'initialiser la carte
                await loadGoogleMaps();
                // Initialiser la carte Google
                initMap();
            } catch (error) {
                console.error('Erreur lors du chargement de Google Maps:', error);
            }
        });
    </script>


    <h2 class="text-center">Horaires</h2>
    <?php include "includes/horaires.php" ?>

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>

</div>

<!-- nom prénom , e-mail , téléphone, message + sujet formulaire = annonce
A CONTINUER PLUS TARD
-->