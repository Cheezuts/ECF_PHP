<?php

// Récupération des horaires depuis la base de données
$query = "SELECT * FROM horaires_semaine";
$select_horaires = mysqli_query($connection, $query);

// Affichage des horaires dans un tableau
echo '<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
                <th>Samedi</th>
                <th>Dimanche</th>
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
    echo '<td>' . $lundi . '</td>';
    echo '<td>' . $mardi . '</td>';
    echo '<td>' . $mercredi . '</td>';
    echo '<td>' . $jeudi . '</td>';
    echo '<td>' . $vendredi . '</td>';
    echo '<td>' . $samedi . '</td>';
    echo '<td>' . $dimanche . '</td>';
    echo '</tr>';
}

echo '</tbody></table>';

// Affichage du statut
echo '<div class="alert ' . ($statut === 'ouvert' ? 'alert-success' : 'alert-danger') . '">Le garage est actuellement : ' . $statut . '</div>';

?>