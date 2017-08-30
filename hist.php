<html>
 <?php include_once "header.php";
  if(!isset($_COOKIE['discover_id'])){
    header( 'Location: test1.php', true, 303 );}?>
<body onload="histFunct()">
            <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
    <div id="wrapper">
    <?php include_once "menu.php"; ?>

        <div id="page-wrapper">
         <div id="form_autentif" style="min-height: 806px;">
        <div class="row">
            <div class="col-lg-18 panel panel-default">
                <div class="panel-heading">Добавить альбом</div>
                <div class="panel-body">
                        <label>История.</label>
                        

                        <table id="dataTables-hist" width="100%" class="table table-striped table-bordered table-hover" style="font-size: 9pt">
                                    <thead>
                                    <tr>
                                        <!-- <th class="sorting_desc"><input type="checkbox" checked="true" id="all_checked_cnt" onclick="disable_all()"></th> -->
                                        <th>Исполнитель</th>
                                        <th>Трек</th>
                                        <th>Дата</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
            <div style="display: inline-block;">
            
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

