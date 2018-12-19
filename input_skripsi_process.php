<?php
include "connection.php";

$npm = $_POST["npm"];
$nama = $_POST["nama"];
$prodi = $_POST["prodi"];

$judul = $_POST["judul"];
$tanggal = $_POST["tanggal"];
$jam = $_POST["jam"];
$ruang = $_POST["ruang"];
$status = $_POST["status"];

$ketua = explode(" | ", $_POST["ketua"]);
$sekretaris = explode(" | ", $_POST["sekretaris"]);
$penguji1 = explode(" | ", $_POST["penguji1"]);
$penguji2 = explode(" | ", $_POST["penguji2"]);
$penguji3 = explode(" | ", $_POST["penguji3"]);

$nip_ketua = $ketua[0];
$nip_sekretaris = $sekretaris[0];
$nip_penguji1 = $penguji1[0];
$nip_penguji2 = $penguji2[0];
$nip_penguji3 = $penguji3[0];


$query = "INSERT INTO tb_ujian_skripsi (npm, nama, prodi, judul, tanggal, jam, ruang, status, nip_ketua, nip_sekretaris, nip_penguji1, nip_penguji2, nip_penguji3) VALUES ('".$npm."','".$nama."','".$prodi."','".$judul."','".$tanggal."','".$jam."','".$ruang."','".$status."','".$nip_ketua."','".$nip_sekretaris."','".$nip_penguji1."','".$nip_penguji2."','".$nip_penguji3."')";
mysqli_query($conn, $query);
mysqli_close($conn);
echo '<script> alert("Data berhasil diinputkan");
window.location = "input_skripsi_form.php";
</script>';
// header("location:input_form.php");

?>