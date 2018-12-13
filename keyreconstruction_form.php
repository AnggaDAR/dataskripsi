<!DOCTYPE html>
<?php
  // include "login.php";
  session_start();
  if($_SESSION['status'] !="login"){
    header("location:login.php");
  }
  // if ($_SESSION['level'] !="dealer") {
  //   header("location:index.php");
  // }
  // include "connection.php";
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPENDUK | Asmuth-Bloom SSS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        Asmuth-Bloom SSS
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Asmuth-Bloom SSS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Masukkan data</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <!-- <form role="form" method="post" action="inputasmuth_process.php" autocomplete="off"> -->
        <form role="form" action="" method="post" > 
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="share">Share</label>
                <input type="text" class="form-control" name="share" placeholder="Masukkan share_1, share_2, .., share_k">
              </div>
            </div>
            <!-- <div class="col-md-12">              
              <div class="col-md-6" style="padding-left: 0px">
                <div class="form-group">
                  <label for="nilai_k">K</label>
                  <input type="text" class="form-control" name="nilai_k" placeholder="Masukkan Nilai K (Threshold)">
                </div>
                <div class="form-group">
                  <label for="nilai_m">m0, m1, .., mn</label>
                  <input type="text" class="form-control" name="nilai_m" placeholder="Masukkan Nilai m0, m1, .., mn">
                </div>                
              </div>
              <div class="col-md-6" style="padding-right: 0px">
                <div class="form-group" >
                  <label for="nilai_n">N</label>
                  <input type="text" class="form-control" name="nilai_n" placeholder="Masukkan Nilai N (Jumlah User)">
                </div>                
              </div>                             
            </div> -->
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary" name="submit">Proses</button>
        </div>
        </form> 
      </div>
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Key Reconstruction</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="col-md-6">             
            
              <?php
                if (!isset($_POST['submit'])) {
                    echo "--------------";
                } else {
                  $share = $_POST["share"];
                  $s=explode(",", $share);
                  for ($i=0; $i < sizeof($s); $i++) { 
                    $s2 = explode("mod", $s[$i]);
                    $rem[$i]=$s2[0];
                    $num[$i]=$s2[1];
                    // echo $s2[0]." ".$s2[1]."<br>";
                    // echo $rem[$i]." ".$num[$i]."<br>";
                  }
                  $k = sizeof($num);
                  $scrt = findMinXb($num, $rem, $k) % 3;//$nilai_m[0];
                  for ($i=0; $i < sizeof($num); $i++) {
                    echo "Share-".($i+1)." = ".$rem[$i]."mod".$num[$i]."<br> ";
                  }
                  echo "<br>Hasil Penyatuan Share = ".$scrt."<br>";
                  echo "---------------------";
                }

                
                function calculateAsmuthBloom($secret, $k, $n, $m){
                  $M = 1;
                  for ($i=1; $i <= $k; $i++) { 
                    $M *= $m[$i];
                  }
                  do {
                    // $a = rand();
                    $a = 51;
                    $y = $secret + $a * $m[0];
                    // echo $a." ".$y." ".$M."<br>";
                  } while ( $y >= $M);
                  // $a = 51;
                  // $y = $secret + $a * $m[0];
                  // echo $a." ".$y." ".$M."<br>";
                  for ($i=1; $i <= $n ; $i++) { 
                    $s[$i] = $y % $m[$i];
                  }
                  return $s;
                }
                function gcd($a, $b){
                  if ($a<$b) {
                    $tmp = $a;
                    $a = $b;
                    $b = $tmp;
                  }
                  $r = $a%$b;
                  while ($r!=0){
                      $a = $b;
                      $b = $r;
                      $r = $a%$b;
                  }
                  return $b;
                }
                function isCoprime($a,$b){
                  if (gcd($a,$b)==1) {
                    return 1;
                  } else {
                    return 0;
                  }  
                }
                function isSetwiseCoprime($m){
                  $result = 1;
                  for ($i=0; $i < count($m); $i++) { 
                    for ($j=0; $j < count($m); $j++) {
                      if ($i != $j){
                        if (gcd($m[$i],$m[$j])==1) {
                          $res = 1;
                        }else{
                          $res = 0;
                        }
                        $result *= $res;
                        // echo $res." ".$result." ".$m[$i]." ".$m[$j]." = ".gcd($m[$i],$m[$j])."<br>";
                      }
                    }
                    // echo "<br>";
                  }
                  return $result;
                }  
                
                function inv($a, $m){ 
                  $m0 = $m;//,$t,$q; 
                  $x0 = 0;
                  $x1 = 1; 
                
                  if ($m == 1){
                    return 0; 
                  }
                  // Apply extended Euclid Algorithm 
                  while ($a > 1){ 
                    //$q is quotient

                    // echo "q = a / m = "  . $a . " / " . $m . " = ";
                    $q = intval($a / $m);
                    // echo $q . "<br>";

                    // echo "t = m = ";
                    $t = $m; 
                    // echo $t . "<br>";
                
                    //$m is remainder now, process 
                    // same as euclid's algo 

                    // echo "m = a % m = " . $a . " % " . $m . " = ";
                    $m = $a % $m;
                    // echo $m . "<br>";

                    // echo "a = t = ";
                    $a = $t; 
                    // echo $a . "<br>";

                    // echo "t = x0 = ";
                    $t = $x0; 
                    // echo $t . "<br>";

                    // echo "x0 = x1 - q * x0 = " . $x1 . " - " . $q . " * " . $x0 . " = ";
                    $x0 = $x1 - $q * $x0; 
                    // echo $x0 . "<br>";

                    // echo "x1 = t = ";
                    $x1 = $t; 
                    // echo $x1 . "<br>";
                    // echo "<br>";
                  } 
                
                  // Make $x1 positive 
                  if ($x1 < 0){
                    // echo "x1 = x1 + m0 = ".$x1." + ".$m0." = ";
                    $x1 += $m0; 
                    // echo $x1 . "<br>";
                  }                
                  return $x1; 
                } 
                
                // k is size of num[] and rem[]. 
                // Returns the smallest number 
                // x such that: 
                // x % num[0] = rem[0], 
                // x % num[1] = rem[1], 
                // .................. 
                // x % num[k-2] = rem[k-1] 
                // Assumption: Numbers in num[] are pairwise  
                // coprime (gcd for every pair is 1) 
                function findMinXb($num, $rem, $k){ 
                  // Compute product of all numbers 
                  $prod = 1; 
                  for ($i = 0; $i < $k; $i++) {
                    $prod *= $num[$i];
                    // if ($i==0) {
                    //   echo $num[$i];
                    // } else {
                    //   echo " * ".$num[$i];
                    // }
                  }
                  // echo " = ".$prod."<br>";
                  // Initialize result 
                  $result = 0; 
                
                  // Apply above formula 
                  for ($i = 0; $i < $k; $i++){ 
                    $pp = $prod / $num[$i];
                    // echo $prod." / ".$num[$i]." = ".$pp."<br><br>";
                    // echo $rem[$i]." * ".inv($pp, $num[$i])." * ".$pp." = ".($rem[$i] * inv($pp, $num[$i]) * $pp)."<br>";
                    $result += $rem[$i] * inv($pp, $num[$i]) * $pp; 
                    // echo "----------------<br>";
                  } 
                  // echo $result."<br> $result % $prod = ".$result % $prod."<br>";
                  return $result % $prod; 
                }             
              
              
            ?>
          </div>
        </div>
      </div>
      <!-- /.box -->      
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
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
