<?php
include "connection.php";

$key = $_POST["key"];

$nik = Encrypt32_64($_POST["nik"],$key);
$nkk = Encrypt32_64($_POST["nkk"],$key);
$nama = Encrypt32_64($_POST["nama"],$key);
$kelamin = Encrypt32_64($_POST["kelamin"],$key);
$tempat_lahir = Encrypt32_64($_POST["tempat_lahir"],$key);
$tanggal_lahir = Encrypt32_64(date("Y-m-d", strtotime($_POST["tanggal_lahir"])),$key);
$alamat = Encrypt32_64($_POST["alamat"],$key);

$nik2 = $_POST["nik"];
$nkk2 = $_POST["nkk"];
$nama2 = $_POST["nama"];
$kelamin2 = $_POST["kelamin"];
$tempat_lahir2 = $_POST["tempat_lahir"];
$tanggal_lahir2 = date("Y-m-d", strtotime($_POST["tanggal_lahir"]));
$alamat2 = $_POST["alamat"];

$query1 = "INSERT INTO tb_enc_data_penduduk (nik, nkk, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) VALUES ('".$nik."','".$nkk."','".$nama."','".$kelamin."','".$tempat_lahir."','".$tanggal_lahir."','".$alamat."')";
$query2 = "INSERT INTO tb_data_penduduk (nik, nkk, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) VALUES ('".$nik2."','".$nkk2."','".$nama2."','".$kelamin2."','".$tempat_lahir2."','".$tanggal_lahir2."','".$alamat2."')";
mysqli_query($conn, $query1);
mysqli_query($conn, $query2);
mysqli_close($conn);
echo '<script> alert("Data berhasil diinputkan");
window.location = "input_form.php";
</script>';
// header("location:input_form.php");
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