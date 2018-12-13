<?php

$secret = $_POST["secret"];
$nilai_k = $_POST["nilai_k"];
$nilai_n = $_POST["nilai_n"];
$nilai_m = $_POST["nilai_m"];
$nilai_m = explode(",", $nilai_m);

echo "Koprima? ".isSetwiseCoprime($nilai_m)."<br>";

$share=calculateAsmuthBloom($secret, $nilai_k, $nilai_n, $nilai_m);
for ($i=1; $i <= $nilai_n; $i++) { 
  echo "share".$i." = ".$share[$i]."<br>";
}

// echo '<script> alert("Data berhasil diinputkan");
// window.location = "input_form.php";
// </script>';
// header("location:input_form.php");
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
?>