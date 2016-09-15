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

  <script>
  $(document).ready(function() {
    //btn check name
    $('#check-name').click(function(event) {
      $.ajax({
        type: 'GET',
        data: "nim="+$('#nim').val(),
        url: "{{action('InterviewController@getName') }}",//+'/'+$('#nim').val(),
        success: function (result) {
          $('#nama').val(result['nama']);
          if ($('#nama').val() == "Nim tidak ditemukan") {
            $('#hide').hide('fast', function() {
              
            });
          } else {
            $('#hide').show('400', function() {
              
            });
            if(result['shift']!=""){
              var selector = "input[type='radio'][value=\'"+ result['shift'] +"\']";
              $(selector).prop({
                'checked': true
              });
            }
          }
        }//end success
      }); //end ajax

    });

    //disable Enter key
    $('#form-pilih-jam').on('keyup keypress', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) { 
        e.preventDefault();
        return false;
      }
    });

    //save btn
    $('#save-btn').click(function(event) {
      $.ajax({
        type: 'POST',
        data: {
          nim: $('#nim').val(),
          jam_interview: $("input[name='jam_interview']:checked", "#form-pilih-jam").val()
        },
        url: "{{action('InterviewController@postSave') }}",
        success: function (result) {
          console.log(result);
          $('#msg').text(result.message);
          $('#msg').show('fast', function() {
            
          });
        }
      }); //end ajax

    });

    

  }); //end document.ready

  </script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header col-sm-12">
      <a class="navbar-brand">Registrasi Nindya 9G</a>
      <img class="pull-right" alt="Brand" src="{{asset('assets/img/Logo-resmi-BSLC-2016.png')}}" width="100px" height="71px">
    </div>
    
  </div>
</nav>
  <div class="container-fluid" id="content">
    <center><h1>Jadwal Interview Calon Nindya 9G</h1></center>

    <div class="col-sm-offset-1 col-sm-10">
      <p>Untuk Binusian yang sudah mendaftarkan diri menjadi calon pengurus BSLC (Nindya 9G), akan ada interview / wawancara pada tanggal <b>23 September 2016</b>. </p>
      <p>Daftarkan nama Anda, dan pilih salah satu dari beberapa jadwal shift interview yang sudah disediakan.</p>
    </div>

    <form class="form-horizontal" id="form-pilih-jam" action="{{action('InterviewController@postSave')}}" method="post">
      <div class="form-group">
        <label for="nim" class="col-sm-2 control-label">NIM</label>
        <div class="col-sm-3">
          <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
          <button type="button" class="btn btn-primary" id="check-name">Check Name</button>
        </div>
      </div>

      <div class="form-group">
        <label for="nama" class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-3">
          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" disabled="true"> *Pastikan NIM yang Anda masukkan benar dan nama Anda muncul disini.
        </div>
        <div class="col-sm-6">
          Jika nama Anda tetap tidak bisa muncul, silahkan menghubungi Nindya BSLC dan memberitahukan <b>NIM dan Nama Anda</b>.
        </div>
      </div>
      
      <div id="hide" hidden="true">
        <div class="form-group">
          <label for="radio-jam-interview" class="col-sm-2 control-label">Jam Interview</label>
          <div class="col-sm-5">
            <table class="table table-bordered">
              <tr>
                <th></th>
                <th>Shift</th>
                <th>Jam interview</th>
                <th>Jumlah peserta terdaftar</th>
                <th>List peserta</th>
              </tr>

              <tr>
                <td><input id="inp-radio-shift-1" type="radio" name="jam_interview" value="Shift 1 : 08.00 - 10.30"></td>
                <td>Shift 1</td>
                <td>Pukul 08.00 - 10.30</td>
                <td><span id="kap-shift-1"></span>{{$data['count_shift_1']}} / 80</td>
                <td><a href="{{action('InterviewController@getListPeserta', 'Shift 1 : 08.00 - 10.30')}}" target="_blank" class="btn btn-primary">View</a></td>
              </tr>

              <tr>
                <td><input id="inp-radio-shift-2" type="radio" name="jam_interview" value="Shift 2 : 11.30 - 14.30"></td>
                <td>Shift 2</td>
                <td>Pukul 11.30 - 14.30</td>
                <td><span id="kap-shift-2"></span>{{$data['count_shift_2']}} / 80</td>
                <td><a href="{{action('InterviewController@getListPeserta', 'Shift 2 : 11.30 - 14.30')}}" target="_blank" class="btn btn-primary">View</a></td>
              </tr>

              <tr>
                <td><input id="inp-radio-shift-3" type="radio" name="jam_interview" value="Shift 3 : 15.00 - 17.00"></td>
                <td>Shift 3</td>
                <td>Pukul 15.00 - 17.00</td>
                <td><span id="kap-shift-3"></span>{{$data['count_shift_3']}} / 80</td>
                <td><a href="{{action('InterviewController@getListPeserta', 'Shift 3 : 15.00 - 17.00')}}" target="_blank" class="btn btn-primary">View</a></td>
              </tr>
              
            </table>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <button type="button" id="save-btn" class="btn btn-default">Save</button>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8">
            <p id="msg" hidden="true"></p>
          </div>
        </div>

      </div>

    </form>
  </div>

</body>
</html>
