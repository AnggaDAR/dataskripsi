<?php
include "connection.php";
$id = $_GET["id"];

$query = "DELETE FROM tb_data_penduduk where nik='".$id."'";
mysqli_query($conn, $query);
mysqli_close($conn);
echo '<script> alert("Data berhasil dihapus");
window.location = "data_view.php";
</script>';
// header("location:input_form.php");
?>