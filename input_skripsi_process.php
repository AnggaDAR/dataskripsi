<?php
include "connection.php";

$nik = $_POST["nik"];
$nama = $_POST["nama"];

$query = "INSERT INTO tb_dosen (nik, nama) VALUES ('".$nik."','".$nama."')";
mysqli_query($conn, $query);
mysqli_close($conn);
echo '<script> alert("Data berhasil diinputkan");
window.location = "input_dosen_form.php";
</script>';
// header("location:input_form.php");

?>