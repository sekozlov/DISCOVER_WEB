 <div id="mainpic" align="center" style="margin-left: auto; margin-right: auto; margin-top: 10%;margin-bottom: 10%;">
                            <a class="open_window" href="test.php">
                                <img id="image" width="200" height="200" src="IMGS/gears.gif" >
                                </a>

                            </div>


<?php 
            $data = array_map('str_getcsv', file('http://s3.amazonaws.com/discover-song/discover.csv'));
            unset($data[$_COOKIE['discov_ind']]);
            sort($data);
            // $datacsv = arrayToCsv($data);
            $fp = fopen('discover.csv', 'w');
            foreach ($data as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
            require('S3/S3.php');
            $s3 = new S3($_SERVER['AWS_ACCESS_KEY_ID'], $_SERVER['$AWS_SECRET_KEY_ID']);
            S3::setAuth($_SERVER['AWS_ACCESS_KEY_ID'], $_SERVER['$AWS_SECRET_KEY_ID']);
            S3::putObject(S3::inputFile('discover.csv', false), 'discover-song', 'discover.csv', S3::ACL_PUBLIC_READ)

            echo "<script>alert('Сделано =)');</script>;
            // <script>document.location='test.php';
            </script>"; 
            ?>

