<html>
 <?php include_once "header.php"; 
 if(!isset($_COOKIE['discover_id'])){
    header( 'Location: test1.php', true, 303 );} ?>
      
<body>
            <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
    <div id="wrapper">
    <?php 
     include_once "data.php";
     //$dama = array_map('str_getcsv', file('/tmp/discover.csv'));
     include_once "menu.php"; ?>
        <div id="page-wrapper">
            <div class="row">
                            <div style="display: none"> 
                            <?php
                            //$data = array_map('str_getcsv', file('discover.csv'));
                            
                            $i = rand(1,count($data)-1);
                            setcookie ("discov_album", str_replace('&',"%26",$dama[$i][1]));
                            setcookie ("discov_song", $dama[$i][3]);
                            setcookie ("discov_artist", str_replace('&',"%26",$dama[$i][2]));
                            $data2 = str_replace('&',"%26",$dama[$i][2]);
                            $data1 = str_replace('&',"%26",$dama[$i][1]);
                            $url = 'https://www.discogs.com/search/?q='.str_replace(' ',"+",$data2).'+-+'.str_replace(' ',"+",$data1).'&type=all';
                            $doc = new DOMDocument();
                            $doc->loadHTMLFile($url);
                            $elements = $doc->getElementsByTagName('h4');
                            $nodes = $elements[0]->childNodes;
                            $url1 = $nodes[0]->getAttribute('href');
                            echo $url1;

                            $img_name1 = 'IMGS/'.str_replace(' ',"+",$_COOKIE['discov_artist']).'+-+'.str_replace(' ',"+",$_COOKIE['discov_album']).'+album+cover.jpg';
                            
                            if (file_exists($img_name1)) {
                                $img_name1 = $img_name1;
                            } else {
                                $img_name1 = 'IMGS/noalbum.jpg';
                            }
                            setcookie ("img_name", $img_name1);
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
                    <div class="panel panel-default" id="Panelll" style="display:block;">
                        <div class="panel-heading" align="center">
                            <b><script>document.write(getCookie('discov_album').split('+').join(' ')) </script></b> ждёт - не дождётся тебя! :)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="mainpic" align="center" class="blur pic">
                            <a class="open_window" href="#">
                                <img id="image" width="400" height="400" src='IMGS/ActiOn_1.jpg'>
                                </a>
                                <script type="text/javascript">
                                console.log(getCookie('img_name'));
                                document.getElementById('image').src = '"'+<?php echo $img_name1; ?>+'"'; 
                                // getCookie('img_name');
                                </script>
                                <script>
                                function show_album(){
                                    window.open("https://play.google.com/store/music/album/Skillet_Unleashed?id=Bwvoawl4jrhfpxqrtwpweggdloa&hl=ru");
                                }
                                </script>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>

                        <!-- /.panel-body -->
                    </div>
            </div>
        </div>
    </div>
    <?php include_once "footer.php"; ?>

         <div class="overlay"></div>
            <div class="popup">
            <div class="close_window">x</div>
            <div class="poptext" style="color: #ddd; float:left; align-self: center;"> 
            <?php 
                            require_once ('simplehtml/simple_html_dom.php');
                                                       $doc = new DOMDocument();
                                          $doc->loadHTMLFile('https://www.discogs.com'.$url1);
                                          $elements = $doc->getElementsByTagName('table');
                                          $nodes = $elements[0]->childNodes;
                                          foreach ($nodes as $node) {
                                                 echo substr($node->nodeValue , 0,75). "<br/>";
                                               }
                            // $href = 'https://www.discogs.com/Skillet-Unleashed/release/8854637';
                            // $page = file_get_contents($href);
                            // preg_match("/<div.*id=\"tracklist\".*>*<\/div>/",$page,$match);
                            // print_r($page);

                            // $html = file_get_html('https://www.discogs.com/Skillet-Unleashed/release/8854637');
                            // $e = $html->find('div[id=tracklist]', 0);
                            // echo $e;
                             ?>

                             </div>
            <div class='popimg' style="float:right; align-self: center; width: 310px;">
                <img id='image1' width="300" height="300" src='IMGS/ActiOn_1.jpg' style="margin-left: auto;margin-right: auto; display: inline-block;">
            </div>
            <script type="text/javascript">
                                document.getElementById('image1').src = '"'+<?php echo $img_name1; ?>+'"';
                                </script>

        </div>
            <script type="text/javascript">
            $('.popup .close_window, .overlay').click(function (){
            $('.popup, .overlay').css({'opacity': 0, 'visibility': 'hidden'});
            });
            $('a.open_window').click(function (e){
            $('.popup, .overlay').css({'opacity': 1, 'visibility': 'visible'});
            e.preventDefault();
            });
            console.log('success');
            </script>
</body>
</html>
