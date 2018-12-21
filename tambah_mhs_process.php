<?php
include "connection.php";

$username = $_POST["username"];
$password = $_POST["password"];
$nama = $_POST["nama"];
$prodi = $_POST["prodi"];

$query = "INSERT INTO tb_user (username, password, nama, prodi) VALUES ('".$username."','".$password."','".$nama."','".$prodi."')";
mysqli_query($conn, $query);
mysqli_close($conn);
echo '<script> alert("Data berhasil diinputkan");
window.location = "tambah_mhs_form.php";
</script>';
// header("location:input_form.php");

?>