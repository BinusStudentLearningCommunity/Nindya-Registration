<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<h1>Admin Panel OJT Nindya 9G</h1>
	</div>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{route('Pendaftar.index')}}">Pendaftar</a>
		</div>
		
		<div class="collapse navbar-collapse navbarCollapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="{{ URL::to('user/logout') }}">Logout</a>
				</li>
			</ul>
        </div>
	</div>
</nav>

<div class="container-fluid">
	<div class="col-md-6 col-xs-5">
		<div>
			<nav>
				<ul class="nav nav-pills">
					<li role="presentation" class=""><a href="">SORT BY</a></li>

					@if($cavis['orderBy'] == 'nim')
						<li role="presentation" class="active"><a href="?orderBy=nim&order={{$cavis['order']}}">Nim</a></li>
					@else
						<li role="presentation"><a href="?orderBy=nim&order={{$cavis['order']}}">Nim</a></li>
					@endif

					@if($cavis['orderBy'] == 'nama')
						<li role="presentation" class="active"><a href="?orderBy=nama&order={{$cavis['order']}}">Nama</a></li>
					@else
						<li role="presentation"><a href="?orderBy=nama&order={{$cavis['order']}}">Nama</a></li>
					@endif

					@if($cavis['orderBy'] == 'created_at')
						<li role="presentation" class="active"><a href="?orderBy=created_at&order={{$cavis['order']}}">Tanggal Daftar</a></li>
					@else
						<li role="presentation"><a href="?orderBy=created_at&order={{$cavis['order']}}">Tanggal Daftar</a></li>
					@endif
					
				</ul>
			</nav>
		</div>

		<div>
			<nav>
				<ul class="nav nav-pills">
					<li role="presentation" class=""><a href="">ORDER</a></li>
					@if($cavis['order'] == 'asc')
						<li role="presentation" class="active"><a href="?orderBy={{$cavis['orderBy']}}&order=asc">Ascending</a></li>
					@else
						<li role="presentation"><a href="?orderBy={{$cavis['orderBy']}}&order=asc">Ascending</a></li>
					@endif

					@if($cavis['order'] == 'desc')
						<li role="presentation" class="active"><a href="?orderBy={{$cavis['orderBy']}}&order=desc">Descending</a></li>
					@else
						<li role="presentation"><a href="?orderBy={{$cavis['orderBy']}}&order=desc">Descending</a></li>
					@endif
					
				</ul>
			</nav>
		</div>

	</div> 
	<!-- end Sort dan Order -->

	<div class="col-md-6 col-xs-7">
		<div class="col-md-12 col-xs-12" style="margin-bottom:4px;">
			<a href="{{URL::route('pendaftar.users.export')}}" class="pull-right btn btn-success">Export Excel (All)</a>
		</div>
		<div class="pull-right">
			<form class="form-inline" method="get" action="{{URL::route('pendaftar.users.wordexport')}}" class="">
			  	<div class="form-group">
			    	<label>From</label>
			    	<input type="date" class="form-control" name="from-date">
			  	</div>
			  	<div class="form-group">
			    	<label>To</label>
			    	<input type="date" class="form-control" name="to-date">
			  	</div>
			  	<button type="submit" class="btn btn-success">Export Word</button>
			</form>
		</div>
		<!-- <a href="{{URL::route('pendaftar.users.wordexport')}}" class="pull-right btn btn-success" style="margin-right:5px;"> Export Word </a> -->
	</div>
</div>

<div class="container-fluid">            
  <table class="table table-bordered table-hover table-condensed table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
		<th>Tgl Daftar</th>
		<th>Tgl Update</th>
		<!--<th>Photo</th>-->
		<th>Action</th>
      </tr>
    </thead>
    <tbody>

    <!-- variabel count untuk penomoran -->
	<?php $count=1; ?>

	@foreach($cavis['data'] as $data)
      <tr>
		<td>{{$count}}</td>
        <td>{{$data->nim}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->created_at}}</td>
        <td>{{$data->updated_at}}</td>
        <!--<td><img style="width:100px; height:120px;" src="asset($data->fullpath)"></td>-->
		<td><a class="btn btn-info" href="{{route('Pendaftar.update', $data->id)}}" role="button">Edit</a>
			<!-- <a class="btn btn-default" href="{{route('Pendaftar.delete', $data->id)}}" role="button">Delete</a> -->
			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal{{$data->nim}}">Delete</button>
		</td>
      </tr>
	  
	  <?php $count++ ?>

	  <!-- Modal Konfirmasi delete-->
		<div class="modal fade" id="myModal{{$data->nim}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-sm" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
		      </div>
		      <div class="modal-body">
		      	<div><b>Danger Zone !</b></div>
		        Are you sure want to delete this data ?
		        <b>{{ $data->nim }} {{ $data->nama }}</b>
		      </div>
		      <div class="modal-footer">
		        <a class="btn btn-danger" href="{{route('Pendaftar.delete', $data->id)}}" role="button">Delete</a>
		        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>
	  <!-- End Modal -->

	@endforeach
    </tbody>
  </table>
</div>

	<hr>
	
	<script type="text/javascript" src="{{ asset('assets/js/jquery-2.2.0.js') }}"> </script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"> </script>

</body>	
</html>
