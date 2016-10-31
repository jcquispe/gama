$(document).ready(function(){
   $("#container-main").show();
   $("#loadingdiv").hide();  

  if($("#nueva").val() == $("#validar").val()){
      $("#cambiar").removeAttr('disabled');
  }    


    $('#emailLink').click(function (event) {
        event.preventDefault();
        alert("Huh");
        var email = 'jcquispe006@gmail.com';
        var subject = 'Circle Around';
        var emailBody = 'Some blah';
        window.location = 'mailto:' + email + '?subject=' + subject + '&body=' +   emailBody;
   });



$("#proveedor").change(function(){
   $.ajax({
        url: '/proveedor/show',
        data: {id: $("#proveedor").val()},
        type: 'GET',
        dataType: 'json',
        success:function(data){
                $("#razon").val(data.nombre);
        }
    });
   
});

$("#categoria").change(function(){
    $(".partida").html('<option value="">-Seleccione-</option>');
    //$("#partida").html('<option value="">-Seleccione-</option>');
    $.ajax({
        url: '/partida/show',
        data: {id: $("#categoria").val()},
        type: 'GET',
        dataType: 'json',
        success:function(data){
            for(var i = 0;i < data.length;i++){
                $(".partida").append("<option value="+data[i].id+">"+data[i].codigo+" - "+data[i].descripcion+"</option>");
                //$("#partida").append("<option value="+data[i].id+">"+data[i].codigo+" "+data[i].descripcion+"</option>");
            }
        }
    });
});

$(".partida").change(function(){
    var indice = this.id;
    $("#producto"+indice).html('<option value="">-Seleccione-</option>');
    $.ajax({
        url: '/insumo/show',
        data: {id: $("#"+indice).val()},
        type: 'GET',
        dataType: 'json',
        success:function(data){
            for(var i = 0;i < data.length;i++){
                $("#producto"+indice).append("<option value="+data[i].id+">"+data[i].codigo+"</option>");
            }
        }
    });
});

$("#partida").change(function(){
    var str = $("#partida option:selected").html();
    var res = str.split(" - ");
    $("#descrip").val(res[1]);
});

$(".producto").change(function(){
    var ide = this.id;
    var indice = ide.substr(-1);
    //$("#producto"+indice).html('<option value="">-Seleccione-</option>');
    $.ajax({
        url: '/producto/show',
        data: {id: $("#"+ide).val()},
        type: 'GET',
        dataType: 'json',
        success:function(data){
            $("#unidad"+indice).val(data.medida);
        }
    });
});

$(".productox").change(function(){
    var ide = this.id;
    var indice = ide.substr(-1);
    //$("#disponible"+indice).removeAttr('readOnly');
    //$("#producto"+indice).html('<option value="">-Seleccione-</option>');
    $.ajax({
        url: '/producto/show',
        data: {id: $("#"+ide).val()},
        type: 'GET',
        dataType: 'json',
        success:function(data){
            $("#unidad"+indice).val(data.medida);
            $("#disponible"+indice).val(data.disponible);
            //$("#disponible"+indice).attr("readOnly", "readOnly");
        }
      
    });
});

$("#guardaPro").click(function(){
   alert('guardar?'); 
});

$("#registro").click(function(){
   var token = $("#token").val();
   
   $.ajax({
      url: '/proveedor',
      headers: {'X-CSRF-TOKEN': token},
      type: 'POST',
      dataType: 'json',
      data: {nom: $("#razon_social").val(),
             nit: $("#nit").val(),
             tel: $("#telefono").val(),
             cor: $("#correo").val()},
      success:function(){
          location.reload();
      }
   });
}); 

$(".costo").blur(function(){
    var cos = this.id;   
    var indice = cos.substr(-1);
    var total = $("#costou"+indice).val()*$("#cantidad"+indice).val();
    $("#costot"+indice).val(total);
});
$(".cantidad").blur(function(){
    var cos = this.id;   
    var indice = cos.substr(-1);
    var total = $("#costou"+indice).val()*$("#cantidad"+indice).val();
    $("#costot"+indice).val(total);
});
$(".solicitado").blur(function(){
    //alert('blur');
    var sol = this.id;
    var indice = sol.substr(-1);
    if($("#"+sol).val()>$("#disponible"+indice).val()){
        alert('No puede solicitar mas de lo disponible');
        $("#"+sol).val('0');
    }
});
$("#fecha").datepicker({
    format: "yyyy-mm-dd",
    startDate: '+0d',
    endDate:'+0d',
    maxViewMode: 0,
    todayBtn: "linked"
});
var num=5;
$("#add").click(function() {
    //alert('click');
    var fila='<tr>'+
                '<td ><select class="partida" name="partida"'+num+' id="'+num+'"><option value="">--Seleccione Partida--</option></select></td>'+
				'<td ><select class="producto" name="producto'+num+'" id="producto'+num+'"><option value="">--Seleccione Producto--</option></select></td>'+
				'<td ><input type="text" name="unidad'+num+'" id="unidad'+num+'" disabled></td>'+
				'<td ><input type="number" name="cantidad'+num+'" id="cantidad'+num+'" value="0" class="cantidad"></td>'+
				'<td ><input type="text" name="costou'+num+'" id="costou'+num+'" value="0" class="costo"></td>'+
				'<td ><input type="text" name="costot'+num+'" id="costot'+num+'"></td>'+
			'</tr>';
    $("#tcuerpo").append(fila);
    $("#indice").val(num);
    num++;
    $(".partida").select2();
    $(".producto").select2();
});

$("#campass").click(function(){
  $("#formcampass").removeAttr('hidden');
  $("#botcampass").attr('hidden', 'hidden');
});

$("#cancelacampass").click(function(){
  $("#formcampass").attr('hidden', 'hidden');
  $("#botcampass").removeAttr('hidden');
});

$("#validarp").keyup(function(){
   if($("#validarp").val() != $("#nuevap").val()){
       $("#msgcodep").removeAttr('hidden');
   }
   else{
       $("#msgcodep").attr('hidden','hidden');
   }
});

$(".despachado").keyup(function(){
   var des = this.id;
   var indice = des.substr(-1);
    if($("#"+des).val()>$("#solicitado"+indice).val()){
        alert('No puede despachar mas de lo solicitado');
        $("#"+des).val('0');
    } 
});


$(".table").DataTable( {
        "bFilter" : true, 
            "sPaginationType" : "full_numbers", 
            "aoColumnDefs" : [{"bVisible" : true, "aTargets" : [0]}], 
            "aLengthMenu" : [[10, 25, 50,  - 1], [10, 25, 50, "Todos"]], 
            "oLanguage" : {
                "sSearch" : "Buscar",
                "sLengthMenu" : "Registros _MENU_", 
                "sZeroRecords" : "No existe registros.", 
                "sInfo" : "Mostrando _START_ al _END_ de _TOTAL_ registros", 
                "sInfgetoEmpty" : "Mostrando 0 al 0 de 0 registros", 
                "sProcessing" : "Cargando registros",
                "sEmptyTable" : "No existe registros para mostrar",
                "sInfoEmpty": "",
                "sInfoFiltered": "",
                "oPaginate" : {
                    "sNext" : "&raquo;", "sPrevious" : "&laquo;", "sFirst" : "Primero", "sLast" : "Último"
                }
            },
        dom: '<"top"f>Blrt<"bottom"ip><"clear">',
        buttons: [
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i> Excel',
                titleAttr: 'Excel',
                title: 'Sistema de Administración de Almacenes'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                titleAttr: 'PDF',
                title: 'Sistema de Administración de Almacenes'
            },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copiar'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Imprimir'
            }
        ]
    } );

    var oTable = $("#ingresostable").dataTable();
    var selectedValue = $("#vigente").val();
    oTable.fnFilter("^"+selectedValue+"$", 7, true);
    
    $("#inventario").val(selectedValue);

  $("#inventario").change(function(){
      var oTable = $("#ingresostable").dataTable();
      var selectedValue = $(this).val();
      oTable.fnFilter("^"+selectedValue+"$", 7, true);
  });


});