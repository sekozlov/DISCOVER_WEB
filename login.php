
<?php
require('funcs.php');
function getUser($USER_ID){
        $DBH = myConnect();
        $str_query="SELECT * FROM BIS_APP.USERS WHERE USER_LOGIN='".$USER_ID."'";  
        $STH=$DBH->prepare($str_query);
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_NUM);
        $res=$STH->fetchAll();
        return $res;    
}

if(isset($_POST['user_id'])){
        $res = getUser($_POST['user_id']);

        if($res[0][2] === $_POST['password']){
             // print_r($res);
              setcookie("id", $res[0][1], time()+60*60*24*30);
        echo 'Авторизация прошла успешно';
        header( 'Location: /Rostelekom_new/viborka.php', true, 303 ); 

      } else 
      echo "<script>alert('Вы ввели неверный пароль');
      document.location='/Rostelekom_new/index.php';</script>";   
      //header( 'Location: /Rostelekom_new/index.php', true, 303 ); }
}
?>