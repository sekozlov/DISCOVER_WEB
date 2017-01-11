<html>
 <?php include_once "header.php"; ?>
      
<body>
            <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
    <div id="wrapper">
    <?php include_once "menu.php"; ?>
        <div id="page-wrapper">
            <div class="row">
                            <div style="display: none"> 
                            <?php
                            $data = array_map('str_getcsv', file('discover.csv'));
                            $i = rand(1,count($data)-1);
                            setcookie ("discov_album", $data[$i][1]);
                            setcookie ("discov_song", $data[$i][3]);
                            $data2 = str_replace('&',"%26",$data[$i][2]);
                            $data1 = str_replace('&',"%26",$data[$i][1]);
                            $url = 'https://www.discogs.com/search/?q='.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'&type=all';
                            $doc = new DOMDocument();
                            $doc->loadHTMLFile($url);
                            $elements = $doc->getElementsByTagName('h4');
                            $nodes = $elements[0]->childNodes;
                            $url1 = $nodes[0]->getAttribute('href');
                            echo $url1;

                            $img_name = 'IMGS/'.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'+album+cover.jpg';
                            if (file_exists($img_name)) {
                                $img_name = $img_name;
                            } else {
                                if (file_exists('IMGS/'.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'+album+cover.jpeg')) {
                                    $img_name = 'IMGS/'.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'+album+cover.jpeg';
                                } else {
                                    if (file_exists('IMGS/'.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'+album+cover.png')) {
                                    $img_name = 'IMGS/'.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'+album+cover.png';
                                } else {
                                    $img_name = 'IMGS/noalbum.jpg';
                                }
                                }
                            }
                            if (file_exists($img_name)) {
                                $img_name = $img_name;
                            } else {
                                $img_name = 'IMGS/noalbum.jpg';
                            }
                            setcookie ("img_name", $img_name);
                            ?>
                            <script type="text/javascript">
                                function getCookie(name) {
                                  var matches = document.cookie.match(new RegExp(
                                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                                  ));
                                  return matches ? decodeURIComponent(matches[1]) : undefined;
                                }
                            </script>
                <!--             <script type="text/javascript">
                            var link = document.getElementsByClassName('search_result_title');
                            var href = link["0"].href;
                            var sub = href.substr(16)
                            console.log(sub);
                            </script> -->
                             </div>
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Добро пожаловать в мир новой музыки!</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
       <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" id="Panelll" >
                        <div class="panel-heading" align="center">
                           Выбери один трек: он будет считаться прослушанным, остальные вернутся в мешок!
                        </div>
                        <!-- /.panel-heading -->
                        <div  class="panel-body">
                        <div id="panel" style="    display: flex;justify-content: space-between;">
                            <div id="mainpic" class="blur">
                            <a class="open_window" href="test.php" style="margin-bottom: 10">
                                <img id="image" width="200" height="200" src="" >
                                </a>
                                <p align="center">
                                <b><script>document.write(getCookie('discov_song').split('+').join(' ')) </script></b>
                                </p>
                            </div>
                            <div id="mainpic1" class="blur">
                                <a class="open_window" href="test.php" style="margin-bottom: 10">
                                <img id="image1" width="200" height="200" src="" >
                                </a>
                                <p align="center">
                                <b><script>document.write(getCookie('discov_song').split('+').join(' ')) </script></b>
                                </p>
                                <script type="text/javascript">
                                console.log(getCookie('img_name'));
                                document.getElementById('image').src = getCookie('img_name');
                                </script>
                            </div>
                            <div id="mainpic2" class="blur">
                                <a class="open_window" href="test.php" style="margin-bottom: 10">
                                <img id="image2" width="200" height="200" src="" >
                                </a>
                                <p align="center">
                                <b><script>document.write(getCookie('discov_song').split('+').join(' ')) </script></b>
                                </p>
                                <script type="text/javascript">
                                console.log(getCookie('img_name'));
                                document.getElementById('image').src = getCookie('img_name');
                                document.getElementById('image1').src = getCookie('img_name');
                                document.getElementById('image2').src = getCookie('img_name');
                                </script>
                            </div>
                            </div>
                            <!-- /.table-responsive -->
                            <span class="stretch"></span>
                             </div>
                        </div>

                        <!-- /.panel-body -->
                    </div>
            </div>
        </div>
    </div>
    <?php include_once "footer.php"; ?>

         <div class="overlay"></div>
            <div class="popup1">
            <div class="close_window"></div>
            <div class="poptext" style="color: #ddd; float:left; align-self: center;"> 
            <p align="center">
            УРА!
            Теперь ты можешь слушать <b><script>document.write(getCookie('discov_song').split('+').join(' ')) </script></b> сколько угодно!
            </p>
            <a href="test.php">Еще треков. </a>

                             </div>
            <div class='popimg' style=" align-self: center;">
                <img id='image' width="500" height="250" src="IMGS/happy.jpg" align="center">
                <script type="text/javascript">
                document.getElementById('image').src = getCookie('img_name'); 
                </script>
            </div>


        </div>
            <script type="text/javascript">
            $('.popup1 .close_window, .overlay').click(function (){
            $('.popup1, .overlay').css({'opacity': 0, 'visibility': 'hidden'});
            });
            $('a.open_window').click(function (e){
            $('.popup1, .overlay').css({'opacity': 1, 'visibility': 'visible'});
            e.preventDefault();
            });
            console.log('success');
            </script>
</body>
</html>
