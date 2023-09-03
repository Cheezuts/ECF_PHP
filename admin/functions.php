<?php 

function confirmQuery($result) {
    global $connection;
    if(!$result ) {
        die("QUERY FAILED ." . mysqli_error($connection));
    }
}

function insert_navigation() {
    global $connection;
    if(isset($_POST['submit'])) {
        $nav_titre = $_POST['nav_titre'];
        if($nav_titre == "" || empty($nav_titre)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO navigation(nav_titre) ";
            $query .= "VALUE('{$nav_titre}') ";
            $create_category_query = mysqli_query($connection, $query);
            if(!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }

}


function findAllnavigation() {
    global $connection;
    $query = "SELECT * FROM navigation";
    $select_navigation = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_navigation)) {
        $nav_id = $row['nav_id'];
        $nav_titre = $row['nav_titre'];
        echo "<tr>";
        echo "<td>{$nav_id}</td>";
        echo "<td>{$nav_titre}</td>";
        echo "<td class='text-center'><a href='navigation.php?edit={$nav_id}'><i class='fa-solid fa-pen fa-2x'></a></td>";
        echo "<td class='text-center'><a href='navigation.php?delete={$nav_id}'><i class='fa-solid fa-trash text-danger fa-2x'></a></td>";
        echo "</tr>";
    }
}

function deletenavigation() {
    global $connection;

    if(isset($_GET['delete'])) {
        $the_nav_id = $_GET['delete'];
        $query = "DELETE FROM navigation WHERE nav_id = {$the_nav_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: navigation.php");
    }  
    }  
                                
?>