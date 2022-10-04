<?php 

    require_once('db.php');

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    $id = uniqid('U-', true);
    $encrypted_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query = "INSERT INTO User VALUES (?, ?, ?, ?, ?)";

    $data = [$id, $username, $fullname, $email, $encrypted_password];

    $result = $db->prepare($query);
    $result->execute($data);

    // Cek dulu ini query berhasil atau gagal.

    header('location: ../../app/login.php');
?>