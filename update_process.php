<?php
include "connection.php";
$id = $_GET["id"];
$nik = $_POST["nik"];
$nkk = $_POST["nkk"];
$nama = $_POST["nama"];
$kelamin = $_POST["kelamin"];
$tempat_lahir = $_POST["tempat_lahir"];
$tanggal_lahir = date("Y-m-d", strtotime($_POST["tanggal_lahir"]));
$alamat = $_POST["alamat"];

$query = "UPDATE tb_data_penduduk SET nik='".$nik."', nkk='".$nkk."', nama='".$nama."', jenis_kelamin='".$kelamin."', tempat_lahir='".$tempat_lahir."', tanggal_lahir='".$tanggal_lahir."', alamat='".$alamat."' WHERE nik='".$id."'";
mysqli_query($conn, $query);
mysqli_close($conn);
echo '<script> alert("Data berhasil diupdate");
window.location = "data_view_simondec.php";
</script>';
// header("location:input_form.php");
?>