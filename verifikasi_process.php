<?php
include "connection.php";
$id = $_GET["id"];

$query = "UPDATE tb_ujian_skripsi SET status_berkas='VALID' where npm='".$id."'";
mysqli_query($conn, $query);
mysqli_close($conn);
echo '<script> alert("Data berhasil divalidasi");
window.location = "cek_data_skripsi.php";
</script>';
// header("location:input_form.php");
?>