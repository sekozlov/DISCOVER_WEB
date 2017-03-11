
<?php

if(isset($_POST['user_id'])){
        $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
        $ciphertext_dec = base64_decode('8d9AVia+A8epe6h6hD36Vu+xlHHDVAnV09r36HSQJDI=');
        $iv_dec = substr($ciphertext_dec, 0, 16);
        $ciphertext_dec = substr($ciphertext_dec, 16);
        $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
        echo $plaintext_dec;
        if($plaintext_dec === $_POST['password']){
             // print_r($res);
              setcookie("discover_id", "sobaka", time()+60*60*24*30);
        echo 'Авторизация прошла успешно';
        header( 'Location: index.php', true, 303 ); 

      } else 
      echo "<script>alert('Вы ввели неверный пароль');
      document.location='test1.php';</script>";   
      //header( 'Location: /Rostelekom_new/index.php', true, 303 ); }
}
?>
