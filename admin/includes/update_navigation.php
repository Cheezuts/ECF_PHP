<form action="" method="post">
                                <div class="form-group">
                                    <label for="nav_titre">Editer Navigation</label>

                                    <?php 
                                    if(isset($_GET['edit'])) {
                                        $nav_id = $_GET['edit'];

                                        $query = "SELECT * FROM navigation WHERE nav_id = $nav_id ";
                                        $select_navigation_id = mysqli_query($connection, $query);

                                        while($row = mysqli_fetch_assoc($select_navigation_id)) {
                                            $nav_id = $row['nav_id'];
                                            $nav_titre = $row['nav_titre'];
                                    ?>
                                    <input value="<?php {echo $nav_titre;} ?>" class="form-control" type="text" name="nav_titre">
                                    <?php }} ?>

                                    <?php 
                                    // UPDATE QUERY
                                    
                                    if(isset($_POST['update_category'])) {
                                        $the_nav_titre = $_POST['nav_titre'];
                                        $query = "UPDATE navigation SET nav_titre = '{$the_nav_titre}' WHERE nav_id = {$nav_id} ";
                                        $update_query = mysqli_query($connection, $query);
                                        if(!$update_query) {
                                            die("QUERY FAILED" . mysqli_error($connection));
                                        }
                                    }

                                    ?>
                                    
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Modifier">
                                </div>
                            </form>