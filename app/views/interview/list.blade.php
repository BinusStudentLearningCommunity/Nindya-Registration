<!DOCTYPE html>
<html>
<head>
  <title>Registrasi Nindya</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
  <script src="{{asset('assets/js/jquery-3.1.0.min.js')}}"></script>
</head>
<body>
  <div class="container-fluid">
    <center><h1>List Peserta</h1></center>
    <h3>{{$data['jam_interview']}}</h3>
    <h4>Terdaftar: {{$data['count']}} / 80</h4>

    <table class="table table-bordered table-hover">
      <tr>
        <td>#</td>
        <td>Nim</td>
        <td>Nama</td>
        <td>Jurusan</td>
      </tr>
      
      <?php $no = 1; ?>
      @foreach($data['cavis'] as $cavis)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$cavis->nim}}</td>
          <td>{{$cavis->nama}}</td>
          <td>{{$cavis->jurusan}}</td>
        </tr>
      @endforeach
    </table>
  </div>
</body>
</html>
