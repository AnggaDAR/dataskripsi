<!DOCTYPE html>
<?php
  // include "login.php";
  session_start();
  if($_SESSION['status'] !="login"){
    header("location:login.php");
  }
  include "connection.php";
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPENDUK | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'sidebar.php'; ?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penduduk
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Penduduk</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Penduduk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="" method="post">
                <div class="row">
                  <div class="col-md-6" >
                    <div class="col-md-2" style="padding-left: 0px">
                      <div class="form-group">
                        <label for="key">Key Dekripsi</label>
                      </div>
                    </div>
                    <div class="col-md-5" style="padding-left: 0px">
                      <div class="form-group">
                        <input type="text" class="form-control" name="key" autocomplete="off" placeholder="Masukkan Key">
                        <!-- <button type="submit" class="btn btn-primary" name="submit">Proses</button> -->
                      </div>
                    </div>
                    <div class="col-md-5" style="padding-left: 0px">
                      <div class="form-group">
                        <!-- <label for="key">Key</label>
                        <input type="text"  name="key" placeholder="Masukkan Key"> -->
                        <button type="submit" class="btn btn-primary" name="submit">Proses</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th>No.</th> -->
                  <th>NIK</th>
                  <th>No. KK</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php                
                $query = "SELECT * FROM tb_enc_data_penduduk";
                $result = mysqli_query($conn, $query);
                $n = 1;
                
                // $tes = '3335';
                // echo $tes." ".rotLeft($tes,1)."<br>";
                  // if ($n == 2) {
                if (!isset($_POST['submit'])) {
                  while ($row = mysqli_fetch_array($result)) {
                    $nik = Hex2String($row[0]);
                    $nkk = Hex2String($row[1]);
                    $nama = Hex2String($row[2]);
                    $jenis_kelamin = Hex2String($row[3]);
                    $alamat = Hex2String($row[4]);
                    $tempat_lahir = Hex2String($row[5]);
                    $tanggal_lahir = Hex2String($row[6]);
                    echo "<tr>";
                    // echo "<td>" . $n . "</td>";
                    echo "<td>" . $nik . "</td>";
                    echo "<td>" . $nkk . "</td>";
                    echo "<td>" . $nama . "</td>";
                    echo "<td>" . $jenis_kelamin . "</td>";
                    echo "<td>" . $alamat . "</td>";
                    echo "<td>" . $tempat_lahir . "</td>";
                    echo "<td>" . $tanggal_lahir . "</td>";
                    echo "<td><a href='edit_form.php?id=".$nik."' class='btn btn-block btn-primary btn-sm'><i class='fa fa-edit'></i> Edit </a>
                              <a href='delete_process.php?id=".$nik."' class='btn btn-block btn-danger btn-sm'><i class='fa fa-trash'></i> Hapus </a></td>";
                    echo "</tr>"; 
                    $n++;                   
                  }
                } else {
                  $key = $_POST['key'];
                  while ($row = mysqli_fetch_array($result)) {
                    $nik = Decrypt32_64($row[0],$key);
                    $nkk = Decrypt32_64($row[1],$key);
                    $nama = Decrypt32_64($row[2],$key);
                    $jenis_kelamin = Decrypt32_64($row[3],$key);
                    $alamat = Decrypt32_64($row[4],$key);
                    $tempat_lahir = Decrypt32_64($row[5],$key);
                    $tanggal_lahir = Decrypt32_64($row[6],$key);
                    echo "<tr>";
                    // echo "<td>" . $n . "</td>";
                    echo "<td>" ./* $row[0] . "<br>" . Hex2String*/$nik . /*"<br>" .Decrypt32_64(Encrypt32_64($row[0])).*/ "</td>";
                    echo "<td>" ./* $row[1] . "<br>" . Hex2String*/$nkk . /*"<br>" .Decrypt32_64(Encrypt32_64($row[1])).*/ "</td>";
                    echo "<td>" ./* $row[2] . "<br>" . Hex2String*/$nama . /*"<br>" .Decrypt32_64(Encrypt32_64($row[2])).*/ "</td>";
                    echo "<td>" ./* $row[3] . "<br>" . Hex2String*/$jenis_kelamin . /*"<br>" .Decrypt32_64(Encrypt32_64($row[3])).*/ "</td>";
                    echo "<td>" ./* $row[4] . "<br>" . Hex2String*/$alamat . /*"<br>" .Decrypt32_64(Encrypt32_64($row[4])).*/ "</td>";
                    echo "<td>" ./* $row[5] . "<br>" . Hex2String*/$tempat_lahir . /*"<br>" .Decrypt32_64(Encrypt32_64($row[5])).*/ "</td>";
                    echo "<td>" ./* $row[6] . "<br>" . Hex2String*/$tanggal_lahir . /*"<br>" .Decrypt32_64(Encrypt32_64($row[6])).*/ "</td>";
                    echo "<td><a href='edit_form.php?id=".$nik."' class='btn btn-block btn-primary btn-sm'><i class='fa fa-edit'></i> Edit </a>
                              <a href='delete_process.php?id=".$nik."' class='btn btn-block btn-danger btn-sm'><i class='fa fa-trash'></i> Hapus </a></td>";
                    echo "</tr>";
                    $n++;
                  }
                  unset($_POST['key']);
                  // $query2 = "";
                }
               
                mysqli_close($conn);

                function keyExpansion($init_key){
                  $wordsize = 16;
                  $key_word = 4;
                  $key_size = $wordsize/$key_word;//4
                  $round = 32;
                  $const_C = 0xfffc;
                  $z0 = array(1, 1, 1, 1, 1, 0, 1, 0, 0, 0,
                              1, 0, 0, 1, 0, 1, 0, 1, 1, 0,
                              0, 0, 0, 1, 1, 1, 0, 0, 1, 1,
                              0, 1, 1, 1, 1, 1, 0, 1, 0, 0,
                              0, 1, 0, 0, 1, 0, 1, 0, 1, 1,
                              0, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 0);
                  for ($i=0; $i < $key_word; $i++) { 
                    $key[$i]=hexdec(substr($init_key, ($wordsize-$key_size)-($i*$key_size), $key_size));
                  }
                  for ($i=$key_word; $i < $round; $i++) { 
                    // $tmp = $this->Shift($key[$i-1],($this->word_size-3));
                    $tmp = rotRight($key[$i-1],3,$wordsize);
                    if ($key_word == 4) {
                      $tmp = $tmp ^ $key[$i-3];
                    }
                    // $tmp2 = $this->Shift($tmp,($this->word_size-1));
                    $tmp = $tmp ^ rotRight($key[$i-1],1,$wordsize);
                    $key[$i] = $const_C ^ $z0[($i-$key_word) % 62] ^ $tmp ^ $key[$i-$key_word];
                  }
                  return $key;
                }
                function Encrypt32_64($text, $init_key){
                  // $init_key = "1918111009080100";
                  $wordsize = 16;
                  $blocksize = $wordsize*2; //32
                  $maxcharlength = $blocksize / 16;//2
                  $rounds = 32;
                  $const_F = 0xffff;
                  $padded_text = Padding32($text);
                  $padded_text_length=strlen($padded_text);
                  $encrypted="";
                  // $key = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,
                  //              0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
                  $key = keyExpansion($init_key);
                  for ($i=0; $i < $padded_text_length/$maxcharlength; $i++) { 
                    $index=$i*2;
                    $word[$i]=String2Hex(substr($padded_text, $index, 2));
                  }
                  for ($i=0; $i < count($word) / 2 ; $i++) { 
                    $index=$i*2;
                    $x=hexdec($word[$index]);
                    $y=hexdec($word[$index+1]);
                    for ($j = 0; $j < $rounds; $j++) {
                      $tmp = $x;
                      $x = ($y ^ (rotLeft($x, 1, $wordsize) & rotLeft($x, 8, $wordsize)) ^ rotLeft($x, 2, $wordsize) ^ $key[$j]);//x = y XOR ((S^1)x AND (S^8)x) XOR (S^2)x XOR k[i]
                      $y = $tmp;//y = x
                    }
                    $word[$index]=dechex($x);
                    $word[$index+1]=dechex($y);
                  }
                  for ($i=0; $i < count($word); $i++) { 
                    $encrypted .= str_pad($word[$i], 4, 0, STR_PAD_LEFT);
                  }
                  return $encrypted;
                }
                function Decrypt32_64($text, $init_key){
                  // $init_key = "1918111009080100";
                  $wordsize = 16;
                  $blocksize = $wordsize * 2;
                  $maxhexlength = $blocksize / 8;//4
                  $rounds = 32;
                  $hexlength=strlen($text);
                  $decrypted="";
                  // $key = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,
                  //              0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
                  $key = keyExpansion($init_key);
                  for ($i=0; $i < $hexlength/$maxhexlength; $i++) { 
                    $index=$i*4;
                    $word[$i]=substr($text, $index, 4);
                  }
                  for ($i=0; $i < count($word) / 2 ; $i++){
                    $index=$i*2;
                    $x=hexdec($word[$index]);
                    $y=hexdec($word[$index+1]);
                    for ($j = ($rounds-1); $j >= 0; $j--) {
                      $tmp = $y;
                      $y = ($x ^ (rotLeft($y, 1, $wordsize) & rotLeft($y, 8, $wordsize)) ^ rotLeft($y, 2, $wordsize) ^ $key[$j]);//y = x XOR ((S^1)y AND (S^8)y) XOR (S^2)y XOR k[i]
                      $x = $tmp;//y = x
                    }
                    $word[$index]=dechex($x);
                    $word[$index+1]=dechex($y);
                  }
                  for ($i=0; $i < count($word) ; $i++) { 
                    $decrypted .= ($word[$i]);
                  }
                  return str_replace("*", "", Hex2String($decrypted));
                }
                function Padding32($text){
                  $pjg_data = strlen($text)*8;
                  $i=32;
                  if ($pjg_data % 32 == 0) {
                    return $text;
                  } else {
                    while ($i<$pjg_data){
                      $i+=32;
                    }
                    return str_pad($text,($i/8),"*");
                  }                  
                }
                function String2Hex($string){
                  $hex='';
                  for ($i=0; $i < strlen($string); $i++){
                      $hex .= str_pad(dechex(ord($string[$i])),2,"0",STR_PAD_LEFT);
                  }
                  return $hex;
                }
                function Hex2String($hex){
                  $string='';
                  for ($i=0; $i < strlen($hex)-1; $i+=2){
                      $string .= chr(hexdec($hex[$i].$hex[$i+1]));
                  }
                  return $string;
                }
                function rotLeft($xx, $i, $j){
                  $x=hexdec($xx);
                  // $j=strlen($xx)*4;
                  return ((($x<<$i)|($x>>($j-$i))) & 0xffff);
                }
                function rotRight($xx, $i, $j){
                  $x=hexdec($xx);
                  // $j=strlen($xx)*4;
                  return ((($x>>$i)|($x<<($j-$i))) & 0xffff);
                }
                ?>             
                </tbody>
                <tfoot>
                <tr>
                  <!-- <th>No.</th> -->
                  <th>NIK</th>
                  <th>No. KK</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'footer.php'; ?>

  <!-- Control Sidebar -->
  <?php //include 'control_sidebar.php';?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      'columnDefs': [
        { 'type': 'num', "targets": 0 }
        ],
      'scrollX': true
    })
    // $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': false,
    //   'searching'   : false,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : false
    // })
  })
</script>
</body>
</html>
