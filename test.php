<html>
 <?php include_once "header.php"; 
  if(!isset($_COOKIE['discover_id'])){
    header( 'Location: test1.php', true, 303 );}
  ini_set('curl.cainfo', 'S3/cacert.pem');
            require_once('S3/Aws.phar');
            use Aws\S3\S3Client;
            use Aws\S3\Exception\S3Exception;
            $client = S3Client::factory(array(
                 'region'            => 'us-east-1',
    'version'           => '2006-03-01',
                 'credentials' => array(
                      'key'    => 'AKIAIT5EXYJMQFCDDSKQ',
                 'secret' => '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',
             )
            ));
           // $data = array_map('str_getcsv', file('discover.csv'));
                $result = $client->getObject(array(
                'Bucket'       => 'discover-song',
                 'Key'          => 'discover.csv',
                 'SaveAs' => '/tmp/discover.csv'
            ));
             //   echo $result['Body'];
                $data = array_map('str_getcsv', file('/tmp/discover.csv'));
                $left = array(' ', ' ');
                foreach($data as $value) {
                    array_push($left,$value[1]);
                };
                $left = array_count_values($left);
                ?>
      
<body>
            <script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
    <div id="wrapper">
    <?php 
                            // ini_set('display_errors', 'On');
                             require_once "setcook.php";?>
    <?php include_once "menu.php"; ?>
        <div id="page-wrapper">
            <div class="row">
                            <div style="display: none"> 
                           
                            <script type="text/javascript">
                                function getCookie(name) {
                                  var matches = document.cookie.match(new RegExp(
                                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                                  ));
                                  return matches ? decodeURIComponent(matches[1]) : undefined;
                                }
                                console.log(<?php echo count($data);?>);
                                var left = <?php echo json_encode($left, JSON_PRETTY_PRINT);?>;
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
                           <p>Выбери один трек: он будет считаться прослушанным, остальные вернутся в мешок! </p>
                           <p>Когда ты не нажимаешь на песенку, в мире грустит один я </p>
                        </div>
                        <!-- /.panel-heading -->
                        <div  class="panel-body">
                        <div id="panel" style="    display: flex;justify-content: space-between;">
                            <div id="mainpic" class="blur">
                            <a class="open_window" href="delete.php" onclick="opennewtab('result.php?al=1')" style="margin-bottom: 10">
                                <img id="image" width="200" height="200" src="" >
                                </a>
                                <p align="center">
                                <b><script>document.write(getCookie('discov_song').split('+').join(' ')) </script></b>
                                </p>
                                <p align="center">
                                <script>document.write(getCookie('discov_artist').split('+').join(' ')) </script>
                                </p>
                                </p>
                                <p align="center">
                                <small>
                                <i>
                                Осталось лишь <b><script>document.write(left[getCookie('discov_album').split('+').join(' ')]) </script></b> треков!
                                </i>
                                </small>
                                </p>
                            </div>
                            <div id="mainpic1" class="blur">
                                <a class="open_window1" href="delete1.php" style="margin-bottom: 10">
                                <img id="image1" width="200" height="200" src="" >
                                </a>
                                <p align="center">
                                <b><script>document.write(getCookie('discov_song1').split('+').join(' ')) </script></b>
                                </p>
                                <p align="center">
                                <script>document.write(getCookie('discov_artist1').split('+').join(' ')) </script>
                                </p>
                                <p align="center">
                                <small>
                                <i>
                                Осталось лишь <b><script>document.write(left[getCookie('discov_album1').split('+').join(' ')]) </script></b> треков!
                                </small>
                                </i>
                                </p>
                                <script type="text/javascript">
                                console.log(getCookie('img_name1'));
                                document.getElementById('image').src = getCookie('img_name');
                                </script>
                            </div>
                            <div id="mainpic2" class="blur">
                                <a class="open_window2" href="delete2.php" style="margin-bottom: 10">
                                <img id="image2" width="200" height="200" src="" >
                                </a>
                                <p align="center">
                                <b><script>document.write(getCookie('discov_song2').split('+').join(' ')) </script></b>
                                </p>
                                <p align="center">
                                <script>document.write(getCookie('discov_artist2').split('+').join(' ')) </script>
                                </p>
                                </p>
                                <p align="center">
                                <small>
                                <i>
                                Осталось лишь <b><script>document.write(left[getCookie('discov_album2').split('+').join(' ')]) </script></b> треков!
                                </small>
                                </i>
                                </p>
                                <script type="text/javascript">
                                console.log(getCookie('img_name'));
                                document.getElementById('image').src = getCookie('img_name');
                                document.getElementById('image1').src = getCookie('img_name1');
                                document.getElementById('image2').src = getCookie('img_name2');
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
    <?php include_once "popup1.php"; ?>
        

</body>
</html>
