<?php
//koneksi ke database mysql
$koneksi = mysqli_connect("localhost","root","","arkademy");
 
//cek jika koneksi ke mysql gagal, 
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>