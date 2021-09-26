<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="https://grupoizamal.com/wp-content/uploads/2020/12/Grupo-izamal-1024x589.png">

  <title>Login Recepcion</title>
  
  {{-- <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/bootstrap-theme.css" rel="stylesheet"> --}}

  <!-- boostrap-->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <!--external css-->
  <!-- font icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  {{-- fontst-icons --}}
  <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.min.css')}}">

  <style type="text/css">
    
    .body { 
      background-image: url("images/Grupo-izamal-1024x589.png"); 
     background-repeat: no-repeat;
      background-position: center; 
    }

  </style>
</head>

<body class="body">

  <div class="container">
      {{-- action y metdo que ejecutara --}}
    <form class="login-form" action="{{route('login')}}" method="post">
        {{-- <img src="https://grupoizamal.com/wp-content/uploads/2020/12/Grupo-izamal-1024x589.png" alt="" width="100%" height="100%"> --}}
        {{-- token  --}}
        @csrf
        <div class="login-wrap">
       
        <p class="text-center" style="font-size:25px; font-family:Homer Simpson UI; font-weight: 900;
        color:#000000">login Recepcion</p><br>
        <div class="input-group">
          <span class="input-group-addon"><i class="fas fa-user fa-2x"></i></span>
          <input type="text" class="form-control" placeholder="Username" autofocus name="username">
         
        </div>
        {{-- {!! $errors->first('username', '<span class="help-block">:message</span>')!!} --}}
        <div class="input-group">
          <span class="input-group-addon"><i class="fas fa-lock fa-2x"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="password">
         
        </div>
        {{-- {!! $errors->first('password', '<span class="help-block">:message</span>')!!} --}}
        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Acceder</button>

      </div>
      
      {!! $errors->first('Credenciales', '<div class="alert alert-primary" >:message</div>')!!}
      
      
    </form>
    <br><br><br><br>
    <div class="text-right">
      <div class="credits">
        Copyright Grupo Izamal ® 2020 <a href="https://grupoizamal.com/">Visitanos</a>
        </div>
    </div>
  </div>

  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

</body>

</html>
