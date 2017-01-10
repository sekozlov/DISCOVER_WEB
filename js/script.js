
function toogleMy(strId,elemInp){//'ViborReg'
    var elem=document.getElementById(strId);
    if ((elem.style.display=='none') && (elemInp.checked===true))
        elem.style.display='block';
    else elem.style.display='none';
}
function toogleMy1(strId,elemInp){//'ViborCanal'
    var elem=document.getElementById(strId);
    if ((elem.style.display=='none') && (elemInp.checked===true))
        elem.style.display='block';
    else elem.style.display='none';
}
function show_shab(option){
    var elem_sms=document.getElementById("shab_SMS");
    var elem_email=document.getElementById("shab_Email");
    if (option==1){
        elem_sms.style.display='block';
        elem_email.style.display='none';
    } else if (option==2){
        elem_email.style.display='block';
        elem_sms.style.display='none';
    }
}
function show_user_delete(){
    var elem_delete=document.getElementById("deleting_show");
    var elem_password=document.getElementById("changing_password_show");
    var new_us=document.getElementById("new_user_show");
    elem_delete.style.display='block';
    elem_password.style.display='none';
    new_us.style.display='none';
}
function show_changing_password(){
    var elem_delete=document.getElementById("deleting_show");
    var elem_password=document.getElementById("changing_password_show");
    var new_us=document.getElementById("new_user_show");
    elem_password.style.display='block';
    elem_delete.style.display='none';
    new_us.style.display='none';
}
function show_new_user(){
    var elem_delete=document.getElementById("deleting_show");
    var elem_password=document.getElementById("changing_password_show");
    var new_us=document.getElementById("new_user_show");
    elem_password.style.display='none';
    elem_delete.style.display='none';
    new_us.style.display='block';
}

function toogleRadio(){
    var elemRad=document.getElementById('rad1');
    var elemRad2=document.getElementById('rad2');
    var elemRad3=document.getElementById('rad3');

    var elem=document.getElementById('DaysCount');
    if (elemRad.checked===true)
        elem.style.display='block';
    else elem.style.display='none';
    var elem1=document.getElementById('CityFilt');
	elem1.style.display='block';
    var elem2=document.getElementById('CanFilt');
    elem2.style.display='block';
    var elem3=document.getElementById('LastAgent');
    if (elemRad.checked===false)
        elem3.style.display='block';
    else elem3.style.display='none';
    var elem4=document.getElementById('Bills');
    elem4.style.display='block';
    var elem5=document.getElementById('Loans');
    elem5.style.display='block';
    var elem6=document.getElementById('Cycle1');
    elem6.style.display='block';




}
function tooglePanel(){
    var elem=document.getElementById('Panelll');
    elem.style.display='block';
    var elem1=document.getElementById('Send');
    elem1.className="btn btn-danger";
}

function test_shablon(i){
    var ShabRes=document.getElementById('shablon');
    var selShab = document.getElementById('shablon_select');
    var val = selShab.options[selShab.selectedIndex].value;
    var strPar = 'IdShab='+val;
    $.ajax({
    type: "POST",
    url: "funcs.php",
    data: strPar,
    success: function(msg){
            ShabRes.value = msg;
            countLetters();
        console.log(msg);
    }
    });
}
function test_shablon_email(i){
    var ShabRes=document.getElementById('shablon_email');
    var selShab = document.getElementById('shablon_select_email');
    var val = selShab.options[selShab.selectedIndex].value;
    var strPar = 'IdShabEmail='+val;
    $.ajax({
    type: "POST",
    url: "funcs.php",
    data: strPar,
    success: function(msg){

            ShabRes.innerHTML = msg;
            CKEDITOR.instances.shablon_email.setData(msg);
          //  CKEDITOR.replace("shablon_email");
        console.log(CKEDITOR.instances.shablon_email);
    }
    });
}
function save_shablon(){
    var ShabRes=document.getElementById('shablon');
    var selShab = document.getElementById('shablon_select');
    var val = selShab.options[selShab.selectedIndex].value;
    var strPar = 'IdShab='+val+'&TextShab='+ShabRes.value;
    $.ajax({
    type: "POST",
    url: "funcs.php",
    data: strPar,
    success: function(msg){
        console.log(msg);
    }
    });
}
function save_shablon_email(){
    var ShabResEmail=document.getElementById('shablon_email');
    var selShabEmail = document.getElementById('shablon_select_email');
    var val = selShabEmail.options[selShabEmail.selectedIndex].value;
    var data = CKEDITOR.instances.shablon_email.getData();
    data.replace(/&/g,'U+0026');
    var strPar = 'IdShabEmail='+val+'&TextShabEmail='+data;
    $.post("funcs.php", {IdShabEmail: val, TextShabEmail: data}, onAjaxSuccess);
    
    console.log(strPar);
    
    
}
function delete_user(){
    if (confirm('Подтвердите, что намереваетесь удалить пользователя. Это действие нельзя отменить.')){
    var UsSel = document.getElementById('UserSel');
    var val = UsSel.options[UsSel.selectedIndex].value;
    var strPar = 'UserToDrop='+val;
    $.ajax({
    type: "POST",
    url: "funcs.php",
    data: strPar,
    success: function(msg){
        if (strPar=='UserToDrop=1'){
            alert('Этого пользователя нельзя удалить.');
        }
    }
    });}
    else {alert('Удаление прервано.');}
}
function password_user(){
    var Pass1 = document.getElementById('Pass1').value;
    var Pass2 = document.getElementById('Pass2').value;
    var UsSelPass = document.getElementById('UserSelPass');
    var val = UsSelPass.options[UsSelPass.selectedIndex].value;
    var strPar = 'UserToChange='+val+'&Password='+Pass1;
    if ((Pass1=='' || Pass2=='')){
        alert('Введите пароль');
        return
    } else if (Pass1==Pass2) {
    $.ajax({
    type: "POST",
    url: "funcs.php",
    data: strPar,
    success: function(msg){
        
        alert('Пароль обновлен.');
        
    }
    });
    }
    else {alert('Пароли не совпадают.');}
}
function show_pos(id){
    var strPar = 'pos_mail_id='+id;
    var disp=$('#pos_table_'+id).css('display');
    var isOpenIcon=$('#icon_'+id).hasClass('fa-angle-down');
    if (isOpenIcon)  {
        $('#icon_'+id).removeClass('fa-angle-down');
        $('#icon_'+id).addClass('fa-angle-up');
    } else {
        $('#icon_'+id).removeClass('fa-angle-up');
        $('#icon_'+id).addClass('fa-angle-down');
    }
    if (disp=='block'){
        $('#pos_table_'+id).css('display','none');
        return;
    } else {
        $('#pos_table_'+id).css('display','block');
    }
    
    $.ajax({
    type: "POST",
    url: "funcs.php",
    data: strPar,
    success: function(msg){
        msg=JSON.parse(msg);

            var arr=msg; var htmlStr="";
            arr.forEach(function(item, i, arr) {
            htmlStr=htmlStr+"<tr>";
            item.forEach(function(itemTd, i, item) {
                htmlStr=htmlStr+"<td>";
                htmlStr=htmlStr+itemTd;
                htmlStr=htmlStr+"</td>";
            });
            htmlStr=htmlStr+"</tr>";
        });
        console.log(msg);
        $('#pos_table_'+id+' tbody').html(htmlStr);
        
    }
    });
    
}

function onAjaxSuccess(str) {
    console.log(str);
}
function create_user(){
    var NewUs = document.getElementById('newlogin').value;       
    strPar = 'NewUser='+NewUs;
    var NewPas = document.getElementById('newpassword').value;       
    strPar = strPar+'&NewPassword='+NewPas;
    var IsAd = document.getElementById('isadmin');
    if (IsAd.checked===true) {
        strPar = strPar+'&IsAd=1';
    } else {
        strPar = strPar+'&IsAd=0';
    }

    var IsSend = document.getElementById('issending');
    if (IsSend.checked===true) {
        strPar = strPar+'&IsSend=1';
    } else {
        strPar = strPar+'&IsSend=0';
    }
     $.ajax({
    type: "POST",
    url: "funcs.php",
    data: strPar,
    success: function(msg){
        alert('Пользователь успешно создан!');
        document.location='/Rostelekom_new/admin.php';
    }
    });
}
function collectF(){
    if (!document.getElementById('rad1').checked && !document.getElementById('rad2').checked && !document.getElementById('rad3').checked) {
        alert('Выберите цель рассылки!');
        return;
    }

    var strPar = 'Test=true';

    var selReg = document.getElementById('RegSel');
    var val = selReg.options[selReg.selectedIndex].value;
    var elemReg=document.getElementById('RegId');
    if (elemReg.checked===true) {
        strPar = strPar+'&RegId='+val;
    }

    var elemCycl = document.getElementById('CheckCycle');
    if (elemCycl.checked===true) {
        strPar = strPar+'&CheckCycle=true';
    }

    var elemMinChar = document.getElementById('MinChar');
    if (elemMinChar.value!='') {
        strPar = strPar+'&MinChar='+elemMinChar.value;
    }
    var elemMaxChar = document.getElementById('MaxChar');
    if (elemMaxChar.value!='') {
        strPar = strPar+'&MaxChar='+elemMaxChar.value;
    }

    var elemMinDz = document.getElementById('MinDz');
    if (elemMinDz.value!='') {
        strPar = strPar+'&MinDz='+elemMinDz.value;
    }
    var elemMaxDz = document.getElementById('MaxDz');
    if (elemMaxDz.value!='') {
        strPar = strPar+'&MaxDz='+elemMaxDz.value;
    }

    var elemRad1=document.getElementById('rad1');
    var elemRad2=document.getElementById('rad2');
    var elemRad3=document.getElementById('rad3');
    var elem=document.getElementById('DaysCountInp');

    var selCanal = document.getElementById('CanalOpt');
    var valcanal = selCanal.options[selCanal.selectedIndex].value;
    strPar = strPar+'&CanalFilter='+valcanal;
    if (elemRad1.checked===true) {
        if(elem.value!=''){
            strPar = strPar+'&Delay='+elem.value;
        }
    }
    if (elemRad2.checked===true) {
        strPar = strPar+'&AutoPay=true';
    }
    if (elemRad2.checked===true || elemRad3.checked===true) {
        var selAg = document.getElementById('AgentSel');
        var valAg = selAg.options[selAg.selectedIndex].value;
        var elemAg=document.getElementById('AgentId');
        if (elemAg.checked===true) {
            strPar = strPar+'&AgId='+valAg;
        }
    }

    $('#dataTables-rassilka tbody').html('');
    $.ajax({
    type: "POST",
    url: "funcs.php",
    data: strPar,
    success: function(msg){
            msg=JSON.parse(msg);

            var arr=msg; var htmlStr="";
            arr.forEach(function(item, i, arr) {
            htmlStr=htmlStr+"<tr>";
            item.forEach(function(itemTd, i, item) {
                htmlStr=htmlStr+"<td>";
                htmlStr=htmlStr+itemTd;
                htmlStr=htmlStr+"</td>";
            });
            htmlStr=htmlStr+"</tr>";
        });
        
        //$('#dataTables-rassilka tbody').html(htmlStr);
            if ( $.fn.dataTable.isDataTable( '#dataTables-rassilka' ) ) {
            table = $('#dataTables-rassilka').DataTable();
            table.destroy();
            }
            
            
            $('#dataTables-rassilka').DataTable({
            data:arr,
                responsive: false,
                language: {
                    "processing": "Подождите...",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "infoPostFix": "",
                    "loadingRecords": "Загрузка записей...",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                    "first": "Первая",
                    "previous": "Предыдущая",
                    "next": "Следующая",
                    "last": "Последняя"
                    },
                    "aria": {
                    "sortAscending": ": активировать для сортировки столбца по возрастанию",
                    "sortDescending": ": активировать для сортировки столбца по убыванию"
                    }
                    }
            });
        
    }
    });
    tooglePanel();
}

function send(){
    if (document.getElementById('Send').className=='btn btn-danger disabled') {
        return;
    }
    var selCanal = document.getElementById('CanalOpt');
    var val = selCanal.options[selCanal.selectedIndex].value;
    var elemRad1=document.getElementById('rad1');
    var val2='';
    
    var elemRad2=document.getElementById('rad2');
    var elemRad3=document.getElementById('rad3');
    if (elemRad1.checked){
        val2='1';
    } else if (elemRad2.checked) {
            val2='2';
            } else {
                val2='3'
            };
    var strPar = 'CanalOpt='+val+"&TypeShab="+val2;
    $.ajax({
    type: "POST",
    url: "funcs.php",
    data: strPar,
    success: function(msg){
        console.log(msg);
        $('#page-wrapper').html('Данные отправлены.');
    }
    });
}

function updatePar(name_param, val){
    $.ajax({
    type: "POST",
    url: "configs.php",
    data: "name_param="+name_param+"&val="+val,
    success: function(msg){
            
    }
    });
}

function countLetters(){
    var elem1 = document.getElementById("shablon");
    var elem2 = document.getElementById("numblett");
    elem2.innerHTML = elem1.value.length;

}

// Test=true&RegId=1&CheckCycle=true&MinChar=1&MaxChar=1&MinDz=1&MaxDz=1
