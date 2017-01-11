<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> </a>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse collapse">
                    <ul class="nav in" id="side-menu">
                        <!--<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input class="form-control" placeholder="Поиск..." type="text">

                            </span>
                            </div>

                        </li>-->
                        <li>
                            <a href="index.php"><i class="fa fa-gift fa-fw"></i>Time to Discover!</a>
                        </li>
                        <li>
<!--                                      class="active" -->
                            <a href="add_album.php"><i class="fa fa-briefcase fa-fw"></i>Your Discoveriography</a>
                        </li>
                        <li>
                            <a href="add_album.php" ><i class="fa fa-edit fa-fw"></i>Add Albums</a>
                        </li>
                         <li>
                            <a href="test.php" ><i class="fa fa-gears fa-fw"></i>TEST!</a>
                        </li>
                        <!--<li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i>Настройка </a>
                        </li>-->

                        <?php 
                        if(isset($_COOKIE['id']) && $_COOKIE['id']==1): ?>
                        <li>
                            <a href="admin.php"><i class="fa fa-wrench fa-fw"></i>Администратор</a>
                        </li>
                    <?php endif; ?>
                        <!--<li>
                            <a href="index.html"><i class="fa fa-bar-chart-o  fa-fw"></i>Визуализация падения скорости интернет соеденения</a>
                        </li>-->
                    </ul>
                </div>
            </div>
        </nav>
