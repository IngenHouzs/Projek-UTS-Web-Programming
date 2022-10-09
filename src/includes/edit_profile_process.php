<?php

require_once('db.php');


// cek apakah user id ada

$uid = $_GET['uid'];

// query untuk cek di database apakah user ada / tidak

$query = "SELECT * FROM user WHERE ID_User = ?";
            
$data = [$uid];
            
$queryExecution = $db->prepare($query); // siapin query
$queryExecution->execute($data); // jalankan hasil query dan ambil data

$result = $queryExecution->fetch(PDO::FETCH_ASSOC); // hasil yang udah diambil

if (empty($result)) {

	// kalo user not found , buat warning
	echo "User tidak ditemukan";
}
else
{

	// cek apakah username yang diganti sudah ada di database
	$cek_username = "SELECT * FROM user WHERE username = ? AND ID_User != ?";
	$data_username = [$_POST['username'] , $uid];

	$query_check_username = $db->prepare($cek_username);
	$query_check_username->execute($data_username);

	$result_check_username = $query_check_username->fetch(PDO::FETCH_ASSOC);

	if ($result_check_username) {
		echo "Username telah digunakan. Gunakan username lain <br>";
	}

	// cek email juga
	$cek_email = "SELECT * FROM user WHERE email = ? AND ID_User != ?";
	$data_email = [$_POST['email'] , $uid];

	$query_check_email = $db->prepare($cek_email);
	$query_check_email->execute($data_email);

	$result_check_email = $query_check_email->fetch(PDO::FETCH_ASSOC);

	if ($result_check_email) {
		echo "Email telah digunakan. Gunakan email lain <br>";
	}

	else
	{
		// cek apakah user berganti password
		if (!empty($_POST['password'])) {

			$pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
			
			// update password user
			$edit_password = "UPDATE user SET password = '$pass' WHERE ID_User = ?";
			$data_password = [$uid];

			$q_edit_password = $db->prepare($edit_password);
			$q_edit_password->execute($data_password);

			// masukin foto dulu ke storage

			if ($_FILES['foto']['size'] != 0) {

				$path = $_FILES['foto']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);

				// nama file yang akan dimasukan ke database + folder
				$target_file = 'foto_user_'.strtotime(date('Y-m-d H:i:s')).'.'.$ext.'';

				$check = $_FILES["foto"]["tmp_name"];

				//Mengupload gambar
                move_uploaded_file($check, '../user_profile/'.$target_file);

			}
			else
			{
				$target_file = $result['foto'];
			}

			// edit profile simpen ke variable
			$username 		= $_POST['username'];
			$nama_lengkap 	= $_POST['nama_lengkap'];
			$email 			= $_POST['email'];

			// query

			$update = "UPDATE user SET username = '$username' , nama_lengkap = '$nama_lengkap' , email = '$email' , foto = '$target_file' WHERE ID_User = ?";
			$data_update = [$uid];

			$q_update_data = $db->prepare($update);
			$q_update_data->execute($data_update);

			echo 'Data sukses diubah. Kembali ke menu <a href=../../app/profile.php> profile </a>';

		}
		else
		{
			// edit profile

			// masukin foto dulu ke storage

			if ($_FILES['foto']['size'] != 0) {

				$path = $_FILES['foto']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);

				// nama file yang akan dimasukan ke database + folder
				$target_file = 'foto_user_'.strtotime(date('Y-m-d H:i:s')).'.'.$ext.'';

				$check = $_FILES["foto"]["tmp_name"];

				//Mengupload gambar
                move_uploaded_file($check, '../user_profile/'.$target_file);

			}
			else
			{
				$target_file = $result['foto'];
			}

			// edit profile simpen ke variable
			$username 		= $_POST['username'];
			$nama_lengkap 	= $_POST['nama_lengkap'];
			$email 			= $_POST['email'];

			// query

			$update = "UPDATE user SET username = '$username' , nama_lengkap = '$nama_lengkap' , email = '$email' , foto = '$target_file' WHERE ID_User = ?";
			$data_update = [$uid];

			$q_update_data = $db->prepare($update);
			$q_update_data->execute($data_update);

			echo 'Data sukses diubah. Kembali ke menu <a href=../../app/profile.php> profile </a>';
		}
	}
}
?>