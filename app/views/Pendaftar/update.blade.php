<!DOCTYPE html>
<html>
	<head>
		<title>Update Cavis</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" crossorigin="anonymous">
	</head>
	<body>
		<div class="container-fluid navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::route('Pendaftar.index') }}">Pendaftar</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<a class="navbar-brand" href="{{ URL::to('user/logout') }}">Logout</a></li>
			</ul>
		</div>

		<div class="container-fluid">
			<div class="col-md-4 col-md-offset-2">
				<h2>Update Data Pendaftar</h2>
				
			</div>
		</div>

		<div>
		<!--  -->
			<!-- form registrasi start -->
		    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ URL::route('Pendaftar.edit') }}">
		    	<!-- NIM -->
		      	<input name="id" class="form-control" value="{{$cavis->id}}" type="hidden">
		      	<div class="form-group">
		        	<label class="control-label col-xs-3 col-md-4" for="nim">NIM*</label>
			        <div class="col-xs-9 col-md-4">
			            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM" value="{{$cavis->nim}}">
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
			        	<input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="{{$cavis->nama}}">
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
		        	@if($cavis->gender == "Laki-laki")
		        	<div class="radio">
		            	<label><input type="radio" name="gender" value="Laki-laki" checked>Laki-laki</label>
		          	</div>
		            <div class="radio">
						<label><input type="radio" name="gender" value="Perempuan">Perempuan</label>
		            </div> 
		            @else
		            <div class="radio">
		            	<label><input type="radio" name="gender" value="Laki-laki">Laki-laki</label>
		          	</div>
		            <div class="radio">
						<label><input type="radio" name="gender" value="Perempuan" checked>Perempuan</label>
		            </div> 
		            @endif
		      	</div>
				<div>
					@if($errors->has('gender'))
						{{ $errors->first('gender') }}
					@endif
				</div>
		    </div>

		    <!-- Fakultas -->
		    <div class="form-group">
		      	<label class="control-label col-xs-3 col-md-4" for="lblFakultas">Fakultas*</label>
		      	<div class="col-xs-9 col-md-4">
		          	<select class="form-control" name="fakultas">
		            	<option value="{{$cavis->fakultas}}">{{$cavis->fakultas}}</option>
		            	<option value="School of Design">School of Design</option>
		            	<option value="Faculty of Humanities">Faculty of Humanities</option>
		            	<option value="School of Business Management">School of Business Management</option>
		            	<option value="School of Computer Science">School of Computer Science</option>
		            	<option value="School of Information System">School of Information System</option>
		            	<option value="Faculty of Engineering">Faculty of Engineering</option>
		            	<option value="Faculty of Economics and Communication">Faculty of Economics and Communication</option>
		          	</select>
		       	</div>
				<div>
					@if($errors->has('fakultas'))
						{{ $errors->first('fakultas') }}
						@endif
				</div>
		    </div>

		    <!-- Jurusan -->
		    <div class="form-group">
		      	<label class="control-label col-xs-3 col-md-4" for="lblJurusan">Jurusan*</label>
		      	<div class="col-xs-9 col-md-4">
		          	<select class="form-control" name="jurusan">
			            <option value="{{$cavis->jurusan}}">{{$cavis->jurusan}}</option>

			            <option value="DKV - New Media">DKV - New Media</option>
			            <option value="DKV - Creative Advertising">DKV - Creative Advertising</option>
			            <option value="DKV - Animation">DKV - Animation</option>
			            <option value="Interior Design">Interior Design</option>

			            <option value="English Literature">English Literature</option>
			            <option value="Chinese Literature">Chinese Literature</option>
			            <option value="Japanese Literature">Japanese Literature</option>
			            <option value="Psychology">Psychology</option>
			            <option value="Business Law">Business Law</option>
			            <option value="International Relation">International Relation</option>
			            <option value="Primary Teacher Education">Primary Teacher Education</option>

			            <option value="Management">Management</option>
			            <option value="Management Global Class">Management Global Class</option>
			            <option value="International Marketing">International Marketing</option>
			            <option value="Management and Information Systems">Management and Information Systems</option>

			            <option value="Computer Science">Computer Science</option>
			            <option value="Computer Science (Global)">Computer Science (Global)</option>
			            <option value="Mobile Application and Technology">Mobile Application and Technology</option>
			            <option value="Game Application and Technology">Game Application and Technology</option>
			            <option value="Cyber Security">Cyber Security</option>
			            <option value="Computer Science and Mathematics">Computer Science and Mathematics</option>
			            <option value="Computer Science and Statistics">Computer Science and Statistics</option>
			            <option value="Master of Information Technology">Master of Information Technology</option>

			            <option value="Information Systems">Information Systems</option>
			            <option value="Information Systems Global Class">Information Systems Global Class</option>
			            <option value="Accounting Information Systems">Accounting Information Systems</option>
			            <option value="Information System Audit">Information System Audit</option>
			            <option value="Information Systems and Accounting">Information Systems and Accounting</option>
			            <option value="Master of System Information">Master of System Information</option>

			            <option value="Industrial Engineering">Industrial Engineering</option>
			            <option value="Civil Engineering">Civil Engineering</option>
			            <option value="Architecture">Architecture</option>
			            <option value="Computer Engineering">Computer Engineering</option>

			            <option value="Accounting">Accounting</option>
			            <option value="Accounting Global Class">Accounting Global Class</option>
			            <option value="Hotel Management">Hotel Management</option>
			            <option value="Marketing Communication">Marketing Communication</option>
			            <option value="Mass Communication">Mass Communication</option>
		          	</select>
		       	</div>
				<div>
					@if($errors->has('jurusan'))
						{{ $errors->first('jurusan') }}
						@endif
				</div>
		    </div>

		    <!-- tempat,tanggal lahir-->
		    <div class="form-group">
		      <label class="control-label col-xs-3 col-md-4">Tempat Lahir*:</label>
		      <div class="col-xs-9 col-md-4">
		          <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" value="{{$cavis->tempat_lahir}}">
		      </div>
				<div>@if($errors->has('tempat_lahir'))
						{{ $errors->first('tempat_lahir') }}
						@endif
				</div>
		    </div>

		     <div class="form-group">
		        <label class="control-label col-xs-3 col-md-4" for="lblTglLahir">Tanggal Lahir*</label>
		        <div class="col-xs-9 col-md-4">
		          <input type="date" class="form-control" name="ttl" value="{{date_format(date_create($cavis->ttl), 'Y-m-d')}}"> 
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
		          <input type="text" name="nomor_telfon" class="form-control" id="nomor_telfon" placeholder="Nomor HP" value="{{$cavis->nomor_telfon}}">
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
		          <input type="text" name="idline" class="form-control" id="idline" placeholder="Id Line" value="{{$cavis->idline}}">
		      </div>
		    </div>

		    <!-- Email -->
		    <div class="form-group">
		      <label class="control-label col-xs-3 col-md-4" for="email">Email*</label>
		      <div class="col-xs-9 col-md-4">
		          <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{$cavis->email}}">
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
		          <input type="text" name="ipk" class="form-control" id="ipk" placeholder="Kosongkan jika belum punya" value="{{$cavis->ipk}}">
		      </div>
		    </div>

		    <!-- Alamat -->
		    <div class="form-group">
		      <label class="control-label col-xs-3 col-md-4" for="alamat">Alamat*</label>
		        <div class="col-xs-9 col-md-4">
		          <textarea rows="5" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat Lengkap">{{$cavis->alamat}}
		          </textarea>
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
		          <textarea rows="5" name="pengalaman_organisasi" class="form-control" id="alamat" placeholder="Pengalaman Organisasi" >{{$cavis->pengalaman_organisasi}}</textarea>
		        </div>
		    </div>

		    <!-- Penghargaan / Prestasi -->
		    <div class="form-group">
		      <label class="control-label col-xs-3 col-md-4" for="alamat">Penghargaan atau Prestasi</label>
		        <div class="col-xs-9 col-md-4">
		          <textarea rows="5" name="penghargaan" class="form-control" id="alamat" placeholder="Penghargaan atau Prestasi" >{{$cavis->penghargaan}}</textarea>
		        </div>
		    </div>
		    
		    <!-- Submit -->
		    <div class="form-group">
		      <div class="col-xs-3 col-md-4"></div>
		      <div class="col-xs-9 col-md-4">
		         <button class="btn btn-success" type="submit" name="submit">Save Changes</button>
		      </div>
		    </div>
			
		  </form>	
		  <!-- form registrasi nya selesai-->

		
		</div>
		</div>
	</body>	
</html>