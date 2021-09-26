<!DOCTYPE html>
<html lang="en">
  <head>
    <title>System Group Izamal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="homeland/css/bootstrap.min.css">
    <link rel="stylesheet" href="homeland/css/magnific-popup.css">
    <link rel="stylesheet" href="homeland/css/jquery-ui.css">
    <link rel="stylesheet" href="homeland/css/owl.carousel.min.css">
    <link rel="stylesheet" href="homeland/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="homeland/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="homeland/css/mediaelementplayer.css">
    <link rel="stylesheet" href="homeland/css/animate.css">
    <link rel="stylesheet" href="homeland/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="homeland/css/fl-bigmug-line.css">


    
  <link rel="shortcut icon" href="https://grupoizamal.com/wp-content/uploads/2020/12/Grupo-izamal-1024x589.png">


     {{-- fontst-icons --}}
    <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}">


    <link rel="stylesheet" href="homeland/css/aos.css">

    <link rel="stylesheet" href="homeland/css/style.css">


    <style type="text/css">
  .boton{
    text-decoration: none;
      padding: 3px;
      padding-left: 10px;
      padding-right: 10px;
      font-family: helvetica;
      font-weight: 300;
      font-size: 25px;
      font-style: italic;
      border-radius: 15px;
  }

  </style>

    @stack('style')
    @livewireStyles
    

  </head>
  <body>
    @livewire('create-historial')

    @livewire('dats-empleados')

  <div class="site-loader"></div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
  <div class="container-fluid">
      <h1>Grupo Izamal</h1>
           <a href="https://grupoizamal.com/"> <img class="rounded-circle" style="" src="{{asset('images/descarga.jpg')}}" alt="" width="80px" height="80px"></a>
    </div>
  </nav>

  
  @yield('contenido')




  @livewireScripts
  <script src="homeland/js/jquery-3.3.1.min.js"></script>
  <script src="homeland/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="homeland/js/jquery-ui.js"></script>
  <script src="homeland/js/popper.min.js"></script>
  <script src="homeland/js/bootstrap.min.js"></script>
  <script src="homeland/js/owl.carousel.min.js"></script>
  <script src="homeland/js/mediaelement-and-player.min.js"></script>
  <script src="homeland/js/jquery.stellar.min.js"></script>
  <script src="homeland/js/jquery.countdown.min.js"></script>
  <script src="homeland/js/jquery.magnific-popup.min.js"></script>
  <script src="homeland/js/bootstrap-datepicker.min.js"></script>
  <script src="homeland/js/aos.js"></script>

  <script src="homeland/js/main.js"></script>

  <script type="text/javascript" src="{{asset('js/bundle/bootstrap.bundle.min.js')}}"></script>

  @stack('js')
<!--   
script para ocultar el modal que viene de livwire -->
 <script >
  //scrip para ocultar modal
  window.livewire.on('ocultarModal',()=>{
    $('#exampleModal').modal('hide');
  });

    //scrip para ocultar modal
  window.livewire.on('mensajes',()=>{
    $('#mensajes').modal('show');
  });

  //mostrar modal para el update confirm 

     //scrip para ocultar modal
  window.livewire.on('MostrarModal',()=>{
    $('#salidas').modal('show');
  });

   //scrip para ocultar modal
  window.livewire.on('concluido',()=>{
    $('#salidas').modal('hide');
  });
</script>



  </body>
</html>