<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
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
                        echo "<td>$user_id</td>";
                        echo "<td>$user_email</td>";
                        echo "<td>$user_password</td>";
                        echo "<td>$user_role</td>";
                        echo "<td class='text-center'><a href='users.php?source=edit_users&user_id={$user_id}'><i class='fa-solid fa-pen fa-2x'></a></td>";
                        echo "<td class='text-center'><a href='users.php?delete={$user_id}'><i class='fa-solid fa-trash text-danger fa-2x'></a></td>";

                        echo "</tr>";

                        }
                        
                        ?>

                    </table>

                    <?php
                    
                    if(isset($_GET['delete'])) {
                        $the_user_id = $_GET['delete'];
                        $query = "DELETE FROM admins WHERE user_id = {$the_user_id} ";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: users.php");

                    }  

                    ?>