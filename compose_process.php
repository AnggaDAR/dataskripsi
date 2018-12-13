<?php
include "connection.php";
session_start();

$pengirim = $_SESSION['username'];
$penerima = $_POST['penerima'];
$subject = $_POST['subject'];
$pesan = $_POST['pesan'];

$query = "INSERT INTO tb_pesan (username_pengirim,username_penerima,subject,pesan) VALUES ('".$pengirim."','".$penerima."','".$subject."','".$pesan."')";
mysqli_query($conn, $query);
mysqli_close($conn);
echo '<script> alert("Data berhasil diinputkan");
window.location = "compose.php";
</script>';
// header("location:input_form.php");

?>