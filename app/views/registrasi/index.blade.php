<!DOCTYPE html>
<html>
<head>
  <title>Registrasi Nindya</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="">Registrasi Nindya 9G</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{URL::to('user/login')}}">Go To Admin</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php 
  $today = date_create();
  $dueDate = date_create("2016-09-21");
?>


<div class="container" id="content">
@if($today < $dueDate)
  <div class="">
    <h2>Join and Become The Next Nindya</h2> 
  </div>

 <!-- form registrasi start -->
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ URL::route('registrasi.success') }}">
     <!-- NIM -->
      <input name="id" class="form-control" value="" type="hidden">
      <div class="form-group">
        <label class="control-label col-xs-3 col-md-4" for="nim">NIM*</label>
        <div class="col-xs-9 col-md-4">
            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM">
        </div>
		<div>@if($errors->has('nim'))
				{{ $errors->first('nim') }}
				@endif
		</div>
      </div>

    <!-- Nama -->
      <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="nama">Nama Lengkap*</label>
      <div class="col-xs-9 col-md-4">
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
      </div>
		<div>@if($errors->has('nama'))
				{{ $errors->first('nama') }}
				@endif
		</div>
    </div>

    <!-- Gender -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="lblGender">Jenis Kelamin*</label>
      <div class="col-xs-9 col-md-4">
          <div class="radio">
            <label><input type="radio" name="gender" value="Laki-laki">Laki-laki</label>
          </div>
              <div class="radio">
                <label><input type="radio" name="gender" value="Perempuan">Perempuan</label>
              </div> 
      </div>
		<div>@if($errors->has('gender'))
				{{ $errors->first('gender') }}
				@endif
		</div>
    </div>

    <!-- Fakultas -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="lblFakultas">Fakultas*</label>
      <div class="col-xs-9 col-md-4">
          <select class="form-control" name="fakultas">
              <option value="">Fakultas</option>
              <option value="Faculty of Economics and Communication">Faculty of Economics and Communication</option>
              <option value="Faculty of Engineering">Faculty of Engineering</option>
              <option value="Faculty of Humanities">Faculty of Humanities</option>
              <option value="School of Business Management">School of Business Management</option>
              <option value="School of Computer Science">School of Computer Science</option>
              <option value="School of Design">School of Design</option>
              <option value="School of Information System">School of Information System</option>
          </select>
       </div>
		<div>@if($errors->has('fakultas'))
				{{ $errors->first('fakultas') }}
				@endif
		</div>
    </div>

    <!-- Jurusan -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="lblJurusan">Jurusan*</label>
      <div class="col-xs-9 col-md-4">
          <select class="form-control" name="jurusan">
            <option value="">Jurusan</option>

            <option value="Accounting">Accounting</option>
            <option value="Accounting Information Systems">Accounting Information Systems</option>
            <option value="Accounting Global Class">Accounting Global Class</option>
            <option value="Architecture">Architecture</option>
            <option value="Business Law">Business Law</option>
            <option value="Chinese Literature">Chinese Literature</option>
            <option value="Civil Engineering">Civil Engineering</option>
            <option value="Computer Engineering">Computer Engineering</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Computer Science (Global)">Computer Science (Global)</option>
            <option value="Computer Science and Mathematics">Computer Science and Mathematics</option>
            <option value="Computer Science and Statistics">Computer Science and Statistics</option>
            <option value="Cyber Security">Cyber Security</option>
            <option value="DKV - New Media">DKV - New Media</option>
            <option value="DKV - Creative Advertising">DKV - Creative Advertising</option>
            <option value="DKV - Animation">DKV - Animation</option>
            <option value="English Literature">English Literature</option>
            <option value="Game Application and Technology">Game Application and Technology</option>
            <option value="Hotel Management">Hotel Management</option>
            <option value="Industrial Engineering">Industrial Engineering</option>
            <option value="Information System Audit">Information System Audit</option>
            <option value="Information Systems">Information Systems</option>
            <option value="Information Systems and Accounting">Information Systems and Accounting</option>
            <option value="Information Systems Global Class">Information Systems Global Class</option>
            <option value="Interior Design">Interior Design</option>
            <option value="International Marketing">International Marketing</option>
            <option value="International Relation">International Relation</option>
            <option value="Japanese Literature">Japanese Literature</option>
            <option value="Management">Management</option>
            <option value="Management and Information Systems">Management and Information Systems</option>
            <option value="Management Global Class">Management Global Class</option>
            <option value="Marketing Communication">Marketing Communication</option>
            <option value="Mass Communication">Mass Communication</option>
            <option value="Master of Information Technology">Master of Information Technology</option>
            <option value="Master of System Information">Master of System Information</option>
            <option value="Mobile Application and Technology">Mobile Application and Technology</option>
            <option value="Primary Teacher Education">Primary Teacher Education</option>
            <option value="Psychology">Psychology</option>
          </select>
       </div>
		<div>@if($errors->has('jurusan'))
				{{ $errors->first('jurusan') }}
				@endif
		</div>
    </div>

    <!-- tempat,tanggal lahir-->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4">Tempat Lahir*:</label>
      <div class="col-xs-9 col-md-4">
          <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir">
      </div>
		<div>@if($errors->has('tempat_lahir'))
				{{ $errors->first('tempat_lahir') }}
				@endif
		</div>
    </div>

     <div class="form-group">
        <label class="control-label col-xs-3 col-md-4" for="lblTglLahir">Tanggal Lahir*</label>
        <div class="col-xs-9 col-md-4">
          <input type="date" class="form-control" name="ttl">
        </div>
		<div>@if($errors->has('ttl'))
				{{ $errors->first('ttl') }}
				@endif
		</div>
    </div>

    <!-- No HP -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="nomor_telfon">Nomor HP*:</label>
      <div class="col-xs-9 col-md-4">
          <input type="text" name="nomor_telfon" class="form-control" id="nomor_telfon" placeholder="Nomor HP">
      </div>
		<div>@if($errors->has('nomor_telfon'))
				{{ $errors->first('nomor_telfon') }}
				@endif
		</div>
    </div>

    <!-- Id Line -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="nim">ID Line:</label>
      <div class="col-xs-9 col-md-4">
          <input type="text" name="idline" class="form-control" id="idline" placeholder="Id Line">
      </div>
    </div>

    <!-- Email -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="email">Email*</label>
      <div class="col-xs-9 col-md-4">
          <input type="email" name="email" class="form-control" id="email" placeholder="Email">
      </div>
		<div>@if($errors->has('email'))
				{{ $errors->first('email') }}
				@endif
		</div>
    </div>

    <!-- IPK -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="lblEmail">IPK</label>
      <div class="col-xs-9 col-md-4">
          <input type="text" name="ipk" class="form-control" id="ipk" placeholder="Kosongkan jika belum punya">
      </div>
    </div>

    <!-- Alamat -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="alamat">Alamat*</label>
        <div class="col-xs-9 col-md-4">
          <textarea rows="5" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat Lengkap"></textarea>
        </div>
		<div>@if($errors->has('alamat'))
				{{ $errors->first('alamat') }}
				@endif
		</div>
    </div>

	<!--image
        <div class="form-group">
        <label class="control-label col-xs-3 col-md-4">Upload Photo 3x4 *</label>
        <div class="col-xs-9 col-md-4">
        <input id="input-2" name="image" type="file">
      </div>
    </div>
	-->

    <!-- Organization Exp -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="alamat">Pengalaman Organisasi</label>
        <div class="col-xs-9 col-md-4">
          <textarea rows="5" name="pengalaman_organisasi" class="form-control" id="alamat" placeholder="Pengalaman Organisasi"></textarea>
        </div>
    </div>

    <!-- Penghargaan / Prestasi -->
    <div class="form-group">
      <label class="control-label col-xs-3 col-md-4" for="alamat">Penghargaan atau Prestasi</label>
        <div class="col-xs-9 col-md-4">
          <textarea rows="5" name="penghargaan" class="form-control" id="alamat" placeholder="Penghargaan atau Prestasi"></textarea>
        </div>
    </div>
    
    <!--jadwal briefing-->
    <div class="form-group">
            <p  class="control-label col-md-8 col-xs-12"  style="color: #B00000;font-size:20px; ">Jadwal Briefing Calon Nindya: Jumat, 23 September 2016</p>            
    </div>

    <!-- Submit -->
    <div class="form-group">
      <div class="col-xs-3 col-md-4"></div>
      <div class="col-xs-9 col-md-4">
         <button class="button" type="submit" name="submit">Submit</button>
      </div>
    </div>
	
  </form>	
  <!-- form registrasi nya selesai-->
  <img src="" alt="asasd">

@else
  <h2>Maaf Pendaftaran sudah ditutup</h2>
@endif

</div>
</body>
</html>
