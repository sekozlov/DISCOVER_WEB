function find_album(){
    var strPar = 'Test=true';
    var elemMaxDz1 = document.getElementById('newartist');
    if (elemMaxDz1.value!='') {
        console.log(elemMaxDz1.value);
        strPar = strPar+'&newartist='+elemMaxDz1.value;
    }
    var elemMaxDz = document.getElementById('newalbum');
    if (elemMaxDz.value!='') {
        console.log(elemMaxDz.value);
        strPar = strPar+'&newalbum='+elemMaxDz.value;
    }

    $('#dataTables-tracks tbody').html('');
    console.log($('#dataTables-tracks'));
    //var elemload = document.getElementById("loader");
    
    //elemload.style.display = "block";
    $.ajax({
    type: "POST",
    url: "find.php",
    data: strPar,
    success: function(msg){
            msg=JSON.parse(msg);
            console.log(msg);
            var arr=msg; var htmlStr="";
            arr.forEach(function(item, i, arr) {
           // htmlStr=htmlStr+"<tr>";
           // htmlStr=htmlStr+"<td>";
                //htmlStr=htmlStr+"<input>";
                //htmlStr=htmlStr+"</td>";
                item.unshift('<input type="checkbox" class="control_row" checked="true" onclick="edit_cntr_mail(this);" id="'+item[0]+'">');
            item.forEach(function(itemTd, i, item) {
                //htmlStr=htmlStr+"<td>";
                //htmlStr=htmlStr+itemTd;
               // htmlStr=htmlStr+"</td>";

            });
            //htmlStr=htmlStr+"</tr>";
        });
        
        //$('#dataTables-rassilka tbody').html(htmlStr);
            if ( $.fn.dataTable.isDataTable( '#dataTables-tracks' ) ) {
            table = $('#dataTables-tracks').DataTable();
            table.destroy();
            }
            
            
            $('#dataTables-tracks').DataTable({
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
            // elemload.style.display = "none";
        
    }
    });

}
function edit_cntr_mail(elem){
    var addnot_value=0;
    if (elem.checked==true) addnot_value=1;
    $.ajax({
    type: "POST",
    url: "find.php",
    data: "addnot_key="+elem.id+"&addnot_value="+addnot_value,
    success: function(msg){
            
    }
    });
}

function opennewtab(url ) {
  var win=window.open(url, '_blank');
}

function add_album(){
    $('#page-wrapper').html('Вроде получилось.');
    var strPar = 'add_album='+'true';
    $.ajax({
    type: "POST",
    url: "find.php",
    data: strPar,
    success: function(msg){
        console.log(msg);
        // $('#page-wrapper').html('Данные отправлены.');
    }
    });
    
}

function histFunct(){
    var strPar = 'Hist=true';
    

    $('#dataTables-hist tbody').html('');
    console.log($('#dataTables-hist'));
    //var elemload = document.getElementById("loader");
    
    //elemload.style.display = "block";
    $.ajax({
    type: "POST",
    url: "find.php",
    data: strPar,
    success: function(msg){
            msg=JSON.parse(msg);
            console.log(msg);
            var arr=msg; var htmlStr="";
			let myArray = Array.from(arr)
            arr.forEach(function(item, i, arr) {
           // htmlStr=htmlStr+"<tr>";
           // htmlStr=htmlStr+"<td>";
                //htmlStr=htmlStr+"<input>";
                //htmlStr=htmlStr+"</td>";
                item.unshift('<input type="checkbox" class="control_row" checked="true" onclick="edit_cntr_mail(this);" id="'+item[0]+'">');
            item.forEach(function(itemTd, i, item) {
                //htmlStr=htmlStr+"<td>";
                //htmlStr=htmlStr+itemTd;
               // htmlStr=htmlStr+"</td>";

            });
            //htmlStr=htmlStr+"</tr>";
        });
        
        //$('#dataTables-rassilka tbody').html(htmlStr);
            if ( $.fn.dataTable.isDataTable( '#dataTables-hist' ) ) {
            table = $('#dataTables-hist').DataTable();
            table.destroy();
            }
            
            
            $('#dataTables-hist').DataTable({
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
            // elemload.style.display = "none";
        
    }
    });

}
