<header>
        <div class="topHeaderRow">
            <div class="container">
                <div class="pull-right">
                    <ul class="list-inline">
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="checkLogin.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                        <li><a href="checkLogin-fave.php"><span class="glyphicon glyphicon-star"></span> Favorites</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end topHeaderRow -->


        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" style="font-family: 'Actor';">Share Your Travels</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.php">About</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                                <li><a href="browse-countries.php">Countries</a></li>
                                <li><a href="browse-images.php">Images</a></li>
                                <li><a href="browse-users.php">Posts</a></li>
                            </ul>
                        </li>
                    </ul>


                    <form class="navbar-form navbar-right" role="search" action="browse-images.php" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search Images" name="imgTitle">
                        </div>
                        <!--<a href="browse-images.php">-->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        <!--</a>-->
                    </form>
                </div>
                <!-- /.navbar-collapse -->


            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>