<html>
<head>
    <meta charset="utf-8">
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <script src="js/script.js"></script>
    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Система рассылки о сроках оплаты</a>
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
                            <a href="index.html" class="active"><i class="fa fa-table fa-fw"></i>Сформировать рассылку</a>
                        </li>
                        <li>
                            <a href="shablon.html" ><i class="fa fa-edit fa-fw"></i>Настройка шаблонов для смс и e-mail</a>
                        </li>
                        <!--<li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i>Настройка </a>
                        </li>-->
                        <li>
                            <a href="index.html"><i class="fa fa-files-o fa-fw"></i>Информация о предыдущих рассылках</a>
                        </li>
                        <!--<li>
                            <a href="index.html"><i class="fa fa-bar-chart-o  fa-fw"></i>Визуализация падения скорости интернет соеденения</a>
                        </li>-->
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Для начала настройки выберите цель рассылки</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form role="form">
                        <div class="form-group">


                            <div class="form-group">
                                <label>Цель рассылки</label>
                                <label class="radio-inline">
                                    <input name="optionsRadiosInline"  id="rad1" onclick="toogleRadio();" value="1" type="radio">Просрочка платежа
                                </label>
                            


                                <label class="radio-inline">
                                    <input name="optionsRadiosInline" id="rad2" value="3" onclick="toogleRadio();" type="radio">Предложение об автоплатеже
                                </label>

                                <label class="radio-inline">
                                    <input name="optionsRadiosInline" id="rad3" value="2" onclick="toogleRadio();" type="radio">Предложение о переходе на другие способы оплаты
                                </label>
                            </div>
                            <div id="DaysCount" style="display:none" class="form-group">
                                <label>Количество просроченных дней</label>
                                <input class="form-control">
                            </div>
                            <div id="CityFilt" style="display:none" class="checkbox">
                                <label>
                                    <input value="false" onclick="toogleMy('ViborReg',this);" type="checkbox">Фильтр по городу
                                </label>
                                <div id="ViborReg" style="display:none" class="checkbox">
                                    <label></label>
                                    <select class="form-control">
                                        <option>Санкт-Петербург</option>
                                        <option>Мурманск</option>
                                        <option>Архангельск</option>
                                        <option>Псков</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div id="CanFilt" style="display:none" class="form-group" >
                                
                                    <label>Выбор канала связи</label>
                                    <select class="form-control">
                                        <option>E-Mail</option>
                                        <option>СМС</option>
                                    </select>
                            </div>
                            
                        </div>
                        <br>
                
                </form>
                <button class="btn btn-primary" onclick="tooglePanel()">Поиск</button> 
                <button class="btn btn-danger disabled" id="Send" >Разослать всему списку</button>
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" id="Panelll" style="display:none;">
                        <div class="panel-heading">
                            Пользователи, подходящие под критерии
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table id="dataTables-rassilka" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th class="sorting_desc">Лицевой счет</th>
                                        <th>Адрес</th>
                                        <th>Текст сообщения</th>
                                        <th>Канал связи</th>
                                        <th>Номер телефона</th>
                                        <th>E-mail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td>example@example.ru</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td>example@example.ru</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td>example@example.ru</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td>example@example.ru</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td></td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td>example@example.ru</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td>example@example.ru</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>98989808908088</td>
                                        <td>город Санкт-Петербург проспект Славы, 54</td>
                                        <td>Мы советуем вам перейти на более выгодный канал оплаты. Оплата через Сбербанк. Ближайший адрес проспект Славы, 67</td>
                                        <td>СМС</td>
                                        <td>98980800</td>
                                        <td></td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-rassilka').DataTable({
                responsive: true
            });
        });
    </script>
</body>
</html>
