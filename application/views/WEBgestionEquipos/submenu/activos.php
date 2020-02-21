

<script> 
   $(document).ready(function(){
      $('#XKZ').on('click',function(){
               var id = $('#txtSelect').val() // obten value of ID element    
               var op = $('#txtSelect2').val() // obten value of ID element    
               $.ajax({
                  type: 'POST' ,
                  data: {datoDeSelect: id , datoDeSelect2: op  },
                  
                  url  : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/AJAXelementosPorTipo/",
               })

               .done(function(listas_rep){
                  $('#example').html(listas_rep)
               })

         // s
      })

   })
</script>



<script> 
   $(document).ready(function(){
      $('#XKZ').on('click',function(){
               var id = $('#txtSelect').val() // obten value of ID element    
               var op = $('#txtSelect2').val() // obten value of ID element    
               $.ajax({
                  type: 'POST' ,
                  data: {datoDeSelect: id , datoDeSelect2: op  },
                  
                  url  : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/AJAXelementosPorTipo/",
               })

               .done(function(listas_rep){
                  $('#example').html(listas_rep)
               })

         // s
      })

   })
</script>






<style type="text/css" media="screen">
   /*.pdfButton {background-color: red !important;       }
   .pdfButton:hover {font-size:15px;color: white;  border-color: white;}
   .excelButton {    background-color: green !important;    }
   .excelButton:hover {font-size:15px;color: white;   border-color: white;}
   .copyButton {     background-color: blue !important;     }
   .copyButton:hover {font-size:15px;color: white; border-color: white;}
   .imprimirButton {    background-color: cyan !important;     color:white;      }
   .imprimirButton:hover {font-size:15px;color: white;   border-color: white;}*/
   th {
      white-space: nowrap;
      font-family: sans-serif;
   }

   #example {
      height: 50vh;
   }
</style>


<script type="text/javascript">
   $(document).ready(function() {
      document.title = 'Datos del Inventario';
      $('#example').DataTable({ //INICIALIZANDO  DATATABLE
         "bDestroy":true,   // PARA RECARGAR LA TABLA AL USAR AJAX
         "lengthChange": true, //cantidad paginas
         "searching": true, //buscador
         "processing": true, //animacion
         "select": true, //marca
         "autoWidth": true, // ancho
         "pagingType": "full_numbers",
         "order": [
         [0, "desc"]
         ], // orden
         "autoWidth": true,

         language: {
            buttons: {
               print: "IMPRIMIR",
               copyTitle: 'Copia Completada ',
               copySuccess: {
                  _: 'se copiaron %d filas',
                  "1": 'solo 1  linea'
               }
            },
            "decimal": "",
            "copyKeys": 'mensaj',
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando... datos",
            "processing": "Procesando... datos",
            "search": "Buscar:",
            "zeroRecords": "No se encontro Informacion :(",
            "paginate": {
               "first": "Primero",
               "last": "Ultimo",
               "next": "Siguiente",
               "previous": "Anterior"
            }
         },




         "buttons": [

            // badge badge-pill

            {
               extend: 'excel',
               className: 'excelButton btn-sm btn-outline-success '
            },
            {
               extend: 'pdf',
               className: 'pdfButton btn-sm btn-outline-danger '
            },
            {
               extend: 'print',
               className: 'imprimirButton btn-sm btn-outline-dark'
            }
            ],




            "dom": '<"dt-buttons"Bf><"clear">lrtp'


         });
   });
</script>




<!-- =======================================================================AJAX================================================================ -->



<!-- computador -->
<script type="text/javascript">
   function ajaxEnablePC(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/enablePC/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la serial' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
      });

   }
</script>
<script type="text/javascript">
   function ajaxDisablePC(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/disablePC/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la serial' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },

      });

   }
</script>
<!-- monitor -->
<script type="text/javascript">
   // d
   function ajaxEnableMon(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/enableMon/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la serial' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },

      });

   }
</script>

<script type="text/javascript">
   function ajaxDisableMon(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/disableMon/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la serial' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },

      });

   }
</script>
<!-- impresoras -->
<script type="text/javascript">
   // d
   function ajaxEnableImpr(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/enableIMpr/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la serial' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },

      });

   }
</script>
<script type="text/javascript">
   // d
   function ajaxDisableImpr(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/disableIMpr/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la serial' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },

      });

   }
</script>
<!-- ups -->
<script type="text/javascript">

   function ajaxEnableUps(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/enableUPS/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la serial' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },

      });

   }
</script>
<script type="text/javascript">

   function ajaxDisableUps(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/disableUPS/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la serial' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },

      });

   }
</script>
<!-- telefono -->
<script type="text/javascript">

   function ajaxEnableTelefono(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/enableTelefono/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la nro' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },

      });

   }
</script>
<script type="text/javascript">

   function ajaxDisableTelefono(informacion) { //recibe value
      // alert(informacion);
      datos = informacion,

      $.ajax({
         url   : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/disableTelefono/",
         type  : "POST",
         data  : {datos:datos} ,
         
         success: function () { alert('Modificado equipo con la nro' + ' :  ' + datos);  document.getElementById('XKZ').click(); },
         error: function () { alert('ERROR con ' + ' :  ' + datos);  document.getElementById('XKZ').click(); },

      });

   }
</script>




<!-- =======================================================================AJAX================================================================ -->


<div class="row align-self-center ">
   <div class="col-6"> 
      <div class="input-group-prepend">
         <div class="input-group-text">Elemento</div>
         <select id="txtSelect" name="txtSelect"  required>
            <option value="computador">Computadores</option>
            <option value="monitor">Monitores</option>
            <option value="impresora">Impresoras</option>
            <option value="ups">UPS</option>
            <option value="telefono">Telefono</option>

         </select>
      </div>

   </div>

   <div class="col-6">
      <div class="input-group-prepend">
         <div class="input-group-text">Disponibilidad</div>
         <select id="txtSelect2" name="txtSelect2" >
            <option value=1 >SI</option>
            <option value=0 >NO</option>
         </select>

         <button type="button"  id="XKZ"class="btn-sm btn-outline-success float-right">Cargar </button>
      </div>

      

   </div>
</div>

<!-- $(this).attr("value") para jquery -->


<script> 
   $(document).ready(function(){
      $('#XKZ').on('click',function(){
               var id = $('#txtSelect').val() // obten value of ID element    
               var op = $('#txtSelect2').val() // obten value of ID element    
               $.ajax({
                  type: 'POST' ,
                  data: {datoDeSelect: id , datoDeSelect2: op  },
                  
                  url  : "<?php echo base_url(); ?>index.php/controllerInventarioHJNC/AJAXelementosPorTipo/",
               })

               .done(function(listas_rep){
                  $('#example').html(listas_rep)
               })

         // s
      })

   })
</script>







<!-- ///////////////////////////////////////////////////////////tabla//////////////////////////////////////////////////////////////////////// -->


<div class="card align-self-center">
   <table id="example" class="align-self-center table  table-bordered table-responsive" cellspacing="0" style="width:100%">
     

   </table>
</div>


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->



