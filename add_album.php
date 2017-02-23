<html>
 <?php include_once "header.php"; ?>
<body>
            <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
    <div id="wrapper">
    <?php include_once "menu.php"; ?>

        <div id="page-wrapper">
         <div id="form_autentif" style="min-height: 806px;">
        <div class="row">
            <div class="col-lg-18 panel panel-default">
                <div class="panel-heading">Добавить альбом</div>
                <div class="panel-body">
                        <label>Привет! Введи исполнителя и альбом, я постараюсь найти его для тебя.</label>
                        <input class="form-control" id="newartist" placeholder="Исполнитель">
                        <input class="form-control" id="newalbum" placeholder="Альбом">
                                            <button onclick="find_album()" class="btn btn-primary"  >Поискать</button> 

                        <table id="dataTables-tracks" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 9pt">
                                    <thead>
                                    <tr>
                                        <!-- <th class="sorting_desc"><input type="checkbox" checked="true" id="all_checked_cnt" onclick="disable_all()"></th> -->
                                        <th></th>
                                        <th>№</th>
                                        <th>Трек</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
            <div style="display: inline-block;">
            <button onclick="add_album()" class="btn btn-danger"  >Добавить</button> 
            <!-- <label style="font-weight: bold;">
                    <input id='isadmin' value="false" style="display:inline;" type="checkbox">Обрезать времечко
            </label> -->

            </div>
            </div>
            </div>
            </div>
    </div>

            
                    
                        <!-- /.panel-heading -->
<!--                         <div class="panel-body">
                            <div id="mainpic" align="center" style="margin-left: auto; margin-right: auto; margin-top: 10%;margin-bottom: 10%;">
                            <a class="open_window" href="index.php">
                                <img id="image" width="200" height="200" src="IMGS/gears.gif" >
                                </a> -->

    </div>
    <?php include_once "footer.php"; ?>


</body>
</html>

