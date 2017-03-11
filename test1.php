<?php 
if(isset($_COOKIE['id'])){
    header( 'Location: index.php', true, 303 ); 
}
?>

<html>
<head>
    <meta charset="utf-8">
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/authorisation.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
    <div class="firstPage">
    <div id="form_autentif" style="min-height: 556px;">
        <div class="row">
            <div class="col-lg-12 panel panel-default">
                <div class="panel-heading">Форма авторизации</div>
                <div class="panel-body">

                    <form action="login.php" method="POST">
                        <label>Имя пользователя в системе:</label>
                        <input class="form-control" id="user_id" name="user_id">
                        <label>Пароль</label>
                        <input class="form-control" id="password" name="password"  type="password"><br><!--type="submit" value="Войти"/-->
                        <button type="submit" class="btn btn-primary"  >Войти</button> 
                    </form>

            </div>
            </div>
        </div>
    </div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        </div>
</body>

</html>
