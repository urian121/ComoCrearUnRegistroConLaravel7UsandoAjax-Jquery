<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg"/>
  <title>Como Crear Un Registro Con Laravel 7 Usando Ajax -Jquery :: WebDeveloper Urian Viera</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/cargando.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/maquinawrite.css') }}">
  <style> 
        table tr th{
            background:rgba(0, 0, 0, .6);
            color: azure;
        }
        h3{
            color:crimson; 
            margin-top: 100px;
        }
        a:hover{
            cursor: pointer;
            color: #333 !important;
        }
        .zmdi:hover{
          color: green;
          cursor: pointer;
        }
      </style>
</head>
<body>
 
<div class="cargando">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>


<nav class="navbar navbar-expand-lg navbar-light navbar-dark fixed-top" style="background-color: #563d7c !important;">
    <ul class="navbar-nav mr-auto collapse navbar-collapse">
      <li class="nav-item active">
        <a href="{{ ('/') }}"> 
          <img src="{{ asset('img/logo-mywebsite-urian-viera.svg') }}" alt="Web Developer Urian Viera" width="120">
        </a>
      </li>
    </ul>
    <div class="my-2 my-lg-0" id="maquinaescribir">
      <h5 class="navbar-brand">Web Developer Urian Viera <span>&#160;</span></h5>
    </div>
</nav>



<div class="container mt-5 p-5">

<!--mensaje aqui ---->
@include('msjs')




  <h4 class="text-center">
    Cómo Crear Un Registro Con Laravel 7 Usando Ajax y Jquery
    <img src="{{ asset('img/laravel.png') }}" alt="Logo"  style="width: 120px;">
  </h4>
  <hr>


<div class="row text-center" style="background-color: #cecece">
  <div class="col-md-6"> 
    <strong>Registrar Nuevo Niño</strong>
  </div>
  <div class="col-md-6"> 
    <strong>Lista de Niños </strong>
  </div>
</div>

<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="body">
      <div class="row clearfix">

<div class="col-sm-5">
<!--- formulario --->
@include('addBoy')

</div>  


          <div class="col-sm-7" id="tablaAntigua">
              <div class="row">
                <div class="col-md-12 p-2">


            @if($boys->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <th>Nombre del Niño</th>
                            <th>Edad </th>
                            <th>Sexo </th>
                            <th>Acción</th>

                        <tbody id="capaboys">
                        </tr>
                            @foreach($boys as $boy)
                                <tr>
                                    <td>{{ $boy->nombre }}</td>
                                    <td>{{ $boy->edad }}</td>
                                    <td>{{ $boy->sexo }}</td>
                                    <td>{{ date('d-m-Y', strtotime($boy->fechaN)) }}</td>
                                     
                                </tr>
                            </tbody>
                            @endforeach
                    </table>

                   
                </div>
            @endif


              </div>
          </div>
          </div>
      </div>
  </div>
</div>



</div>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });


    $("#btnEnviarForm").click(function(e){ 
        e.preventDefault();  //evita recargar la pagina

        var route = $('#form-data').data('route');
        var form  = $("#form-data").attr("action");

        var formValues = $(this).serialize();
        var dataString = $("#form-data").serialize();
    
         $.ajax({
            type:'POST',
            url:form,
            data:dataString,
            //data:formValues,
            success:function(Response){

            $("#msj").show(250); //Mostrar el mensaje ya que por defecto esta Oculto
            $('#respuesta').html(Response.mensaje);

          var html = '';
         $(Response.boys).each(function(key, value) {
           html += '<tr>' +
             '<td>' + value.nombre + '</td>' +
             '<td>' + value.edad + '</td>' +
             '<td>' + value.sexo + '</td>' +
             '<td>' + value.fechaN + '</td>' +
             '</tr>';
            }); 

         $('#capaboys').html(html); 
          $("#form-data")[0].reset(); //limpiar Formulario
              
            //Desaparecer el mensaje de Exito
            setTimeout(function () {
                $("#msj").fadeOut(1500);
            }, 5000);
               // console.log(Response);
            }
        });
           
  });
});

</script>

</body>
</html>