<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Administration</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../index.php">Retour sur le site</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa-solid fa-chart-line text-primary fa-2x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#horaires_dropdown"><i class="fa-solid fa-clock text-primary fa-2x"></i> Horaires<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="horaires_dropdown" class="collapse">
                            <li>
                                <a href="./horaires.php">Toutes les horaires</a>
                            </li>
                            <li>
                                <a href="horaires.php?source=add_horaires">Ajout d'horaire</a>
                            </li>
                        </ul>
                    </li>                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#services_dropdown"><i class="fa-solid fa-note-sticky text-primary fa-2x"></i> Services<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="services_dropdown" class="collapse">
                            <li>
                                <a href="./services.php">Tous les services</a>
                            </li>
                            <li>
                                <a href="services.php?source=add_services">Ajout de service</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#voitures_dropdown"><i class="fa-solid fa-car text-primary fa-2x"></i> Voitures<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="voitures_dropdown" class="collapse">
                            <li>
                                <a href="./voitures.php">Toutes les Voitures</a>
                            </li>
                            <li>
                                <a href="voitures.php?source=add_voitures">Ajout de Voiture</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./navigation.php"><i class="fa-solid fa-location-arrow text-primary fa-2x"></i> Navigation</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#commentaires_dropdown"><i class="fa-regular fa-comments text-primary fa-2x"></i> Commentaires<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="commentaires_dropdown" class="collapse">
                            <li>
                                <a href="./commentaires.php">Toutes les Commentaires</a>
                            </li>
                            <li>
                                <a href="commentaires.php?source=add_commentaires">Ajout de Commentaire</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-user text-primary fa-2x"></i> Utilisateurs<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">Tous les Utilisateurs</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_users">Ajouter un Utilisateurs</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>