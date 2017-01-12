 <div id="mainpic" align="center" style="margin-left: auto; margin-right: auto; margin-top: 10%;margin-bottom: 10%;">
                            <a class="open_window" href="test.php">
                                <img id="image" width="200" height="200" src="IMGS/gears.gif" >
                                </a>

                            </div>
<?php 
            $data = array_map('str_getcsv', file('discover.csv'));
            unset($data[$_COOKIE['discov_ind1']]);
            sort($data);
            // $datacsv = arrayToCsv($data);
            $fp = fopen('discover.csv', 'w');
            foreach ($data as $fields) {
                fputcsv($fp, $fields);
            }
            fclose($fp);
            echo "<script>alert('Сделано =)');
            document.location='test.php';</script>"; 
            ?>

