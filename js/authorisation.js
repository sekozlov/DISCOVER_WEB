function authorization(){
    var elem_user=document.getElementById("user_id").value;
    var elem_pass=document.getElementById("password").value;
    var strPar='submit=true&user_id='+elem_user+'&password='+elem_pass;
    console.log(strPar);
    $.ajax({
    type: "POST",
    url: "login.php",
    data: strPar,
    success: function(msg){
            if (msg='Авторизация прошла успешно'){
                location.replace("viborka.php")
            }
        
        console.log(msg);
    },
    error: function(err){
        console.log(err);
    }
    });
}

//onclick="authorization()"
