<html>
 <?php include_once "header.php"; ?>
      
<body>
<!--             <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script> -->
    <div id="wrapper">
    <?php include_once "menu.php"; ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h1 class="page-header">Добро пожаловать в мир новой музыки!</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
       <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" id="Panelll" style="display:block;">
                        <div class="panel-heading" align="center">
                            Самое время для Feel Invincible с альбома Unleashed!
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="mainpic" align="center" class="blur pic">
                            <a class="open_window" href="#">
                                <img width="400" height="400" src="IMGS/ActiOn_3.jpg" >
                                </a>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                            <?php
                            $data = array_map('str_getcsv', file('discover.csv'));
                            ?>
                        <!-- /.panel-body -->
                    </div>
            </div>
        </div>
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
         <div class="overlay"></div>
            <div class="popup">
            <div class="close_window">x</div>
            <div class="poptext" style="color: #ddd; float:left;"> 
            <?php 
                            include 'simplehtml/simple_html_dom.php';
                            // $href = 'https://www.discogs.com/Skillet-Unleashed/release/8854637';
                            // $page = file_get_contents($href);
                            // preg_match("/<div.*id=\"tracklist\".*>*<\/div>/",$page,$match);
                            // print_r($page);

                            $html = file_get_html('https://www.discogs.com/Skillet-Unleashed/release/8854637');
                            $e = $html->find('div[id=tracklist]', 0);
                            echo $e;
                             ?>
                             </div>
            <div class='popimg' style="float:right;">
                <img width="300" height="300" src="IMGS/ActiOn_3.jpg" style="margin-left: auto;margin-right: auto; display: inline-block;">
            </div>

        </div>
            <div style="display: none"> 
            <?php
            $url = 'https://www.discogs.com/search/?q='.'skillet'.'+-+'.'unleashed'.'&type=all';
            $html = file_get_html($url);
            $e = $html->find('div[id=search_results]', 0)->find('div', 0);
            preg_match("/<h4.*.*>*<\/h4>/",$e,$match);
            preg_match("/<a.*.*>*<\/a>/iU",$match[0],$match1);
            echo $match1[0];
            ?>
            <script type="text/javascript">
            var link = document.getElementsByClassName('search_result_title');
            var href = link["0"].href;
            var sub = href.substr(16)
            console.log(sub);
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
