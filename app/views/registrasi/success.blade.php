<!DOCTYPE html>
<html>
<head>
  <title>Registrasi Nindya</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<!-- <div class="jumbotron text-center">

  
</div> -->

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Registrasi Nindya 9G</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{URL::to('user/login')}}">Go To Admin</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" id="content">
    <h2>Join and Become The Next Nindya</h2> 
    <h3>Terima kasih telah mendaftar</h3>

    <div class="well well-lg">
      <p> Ingat, Jadwal Briefing anda pada hari Jumat, 23 September 2016.</p>
      <p> Untuk ruangan akan di diinfokan melalui contact person yang telah dicantumkan. </p>
      <p> Berikut ini adalah E-Module yang berisi tentang apa itu BSLC. </p>
      <p> Silahkan download <a href="{{ URL::route('registrasi.download') }}">disini</a>  </p>
      <p> See you :)</p>
      <p> <b>Contact Person:</b></p>
      <p> <b>Joshua Arga Putra</b> </p>
      <p> Line: josharga / HP: 0852 5285 1065 </p>
      <p> <b>Kevin Hadinata</b> </p>
      <p> Line: kevinhadinata96 / HP: 0813 1120 0077 </p>
    </div>
    <center><a class="btn btn-success" href="{{URL::route('registrasi.index')}}"> Back </a></center>
</div>
</body>
</html>