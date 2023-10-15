<?php

// Récupération des horaires depuis la base de données
$query = "SELECT * FROM horaires_semaine";
$select_horaires = mysqli_query($connection, $query);

// Affichage des horaires dans un tableau
echo '<div class="row">
        <div class="col-xs-12 col-sm-offset-1 col-sm-10 col-md-8 col-md-offset-2">
            <div class="well">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Jours</th>
                                <th class="text-center">Heures d\'ouverture</th>
                            </tr>
                        </thead>
                        <tbody>';

while ($row = mysqli_fetch_assoc($select_horaires)) {
    $id = $row['id'];
    $statut = $row['statut'];
    $lundi = $row['lundi'];
    $mardi = $row['mardi'];
    $mercredi = $row['mercredi'];
    $jeudi = $row['jeudi'];
    $vendredi = $row['vendredi'];
    $samedi = $row['samedi'];
    $dimanche = $row['dimanche'];

    echo '<tr>';
    echo '<td class="text-center">Lundi</td>';
    echo '<td class="text-center">' . $lundi . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class="text-center">Mardi</td>';
    echo '<td class="text-center">' . $mardi . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class="text-center">Mercredi</td>';
    echo '<td class="text-center">' . $mercredi . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class="text-center">Jeudi</td>';
    echo '<td class="text-center">' . $jeudi . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class="text-center">Vendredi</td>';
    echo '<td class="text-center">' . $vendredi . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class="text-center">Samedi</td>';
    echo '<td class="text-center">' . $samedi . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td class="text-center">Dimanche</td>';
    echo '<td class="text-center">' . $dimanche . '</td>';
    echo '</tr>';
}

echo '</tbody></table>';

// Affichage du statut
echo '<div class="text-center alert ' . ($statut === 'ouvert' ? 'alert-success' : 'alert-danger') . '">Le garage est actuellement : ' . $statut . '</div>';

echo '</div>
    </div>
</div>';

?>