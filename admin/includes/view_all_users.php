<?php 

if(isset($_POST['checkBoxArray'])) {
    foreach($_POST['checkBoxArray'] as $userValueId) {
        $bulk_options = $_POST['bulk_options'];

        switch($bulk_options) {
            case 'admin':
                $query = "UPDATE admins SET user_role = '{$bulk_options}' WHERE user_id = {$userValueId} ";
                $update_to_admin_status = mysqli_query($connection, $query);
                confirmQuery($update_to_admin_status);
                break;

            case 'user':
                $query = "UPDATE admins SET user_role = '{$bulk_options}' WHERE user_id = {$userValueId} ";
                $update_to_user_status = mysqli_query($connection, $query);
                confirmQuery($update_to_user_status);
                break;

            case 'supprimer':
                $query = "DELETE FROM admins WHERE user_id = {$userValueId} ";
                $delete_user = mysqli_query($connection, $query);
                confirmQuery($delete_user);
                break;
        }
    }
}

?>

<form action="" method="post">
<table class="table table-bordered table-hover">

<div id="bulkOptionsContainer" class="col-xs-4">
    <select name="bulk_options" id="bulk_options" class="form-control">
        <option value="">Selectionnez une option</option>
        <option value="admin">admin</option>
        <option value="user">user</option>
        <option value="supprimer">Supprimer</option>
    </select>
</div>

<div class="col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Appliquer">
    <a class="btn btn-primary" href="users.php?source=add_users">Ajouter un utilisateur</a>
</div>


                        <thead>
                            <tr>
                            <th><input id="selectAllBoxes" type="checkbox"></th>
                                <th>Id</th>
                                <th>e-mail</th>
                                <th>Password</th>
                                <th>Rôle</th>
                                <th>Editer</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php 
                        $query = "SELECT * FROM admins";
                        $select_users = mysqli_query($connection, $query);
                    
                        while($row = mysqli_fetch_assoc($select_users)) {
                        $user_id = $row['user_id'];
                        $user_email = $row['user_email'];
                        $user_password = $row['user_password'];
                        $user_role = $row['user_role'];

                        echo "<tr>";
                        ?>

                        <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $user_id ?>'></td>

                        <?php
                        echo "<td>$user_id</td>";
                        echo "<td>$user_email</td>";
                        echo "<td>$user_password</td>";
                        echo "<td>$user_role</td>";
                        echo "<td class='text-center'><a href='users.php?source=edit_users&user_id={$user_id}'><i class='fa-solid fa-pen fa-2x'></a></td>";
                        echo "<td class='text-center'><a onClick=\"javascript: return confirm('etes vous sur de vouloir supprimer ?')\" href='users.php?delete={$user_id}'><i class='fa-solid fa-trash text-danger fa-2x'></a></td>";

                        echo "</tr>";

                        }
                        
                        ?>

                    </table>
                    </form>

                    <?php
                    
                    if(isset($_GET['delete'])) {
                        $the_user_id = $_GET['delete'];
                        $query = "DELETE FROM admins WHERE user_id = {$the_user_id} ";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: users.php");

                    }  

                    ?>