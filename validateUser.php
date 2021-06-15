<?php
// include("db.php");
// if (!isset($_SESSION)) {
//     session_start();
// }
function validate($user)
{
    $errors = array();
    $emailControl = $user['email'];
    $usernameControl = $user['username'];
    # code...
    if (empty($user['username'])) {
        # code...
        array_push($errors, 'Kullanıcı Adı Gerekli');
    }
    if (empty($user['email'])) {
        # code...
        array_push($errors, 'Email Gerekli');
    }
    if (empty($user['password'])) {
        # code...
        array_push($errors, 'Password Gerekli');
    }

    if ($user['re_password'] !== $user['password']) {
        # code...
        array_push($errors, 'Şifreler Uyuşmuyor');
    }
    // $existUser = selectAll();
    global $conn;
    $sql = "SELECT * FROM users where user_email = '$emailControl' 
    or user_name ='$usernameControl'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        array_push($errors, 'Kullanıcı Mevcut');
    }
    return $errors;
}


function validateLogin($user)
{
    $errors = array();
    $usernameControl = $user['username'];
    $passwordControl = $user['password'];
    # code...
    // write($usernameControl);
    // write($passwordControl);
    if (empty($user['username'])) {
        # code...
        array_push($errors, 'Kullanıcı Adı Gerekli');
    }
    if (empty($user['password'])) {
        # code...
        array_push($errors, 'Password Gerekli');
    }

    // $existUser = selectAll();
    global $conn;
    $sql = "SELECT * FROM users 
    where (user_name = '$usernameControl' 
    or user_email = '$usernameControl')";
    $result = mysqli_query($conn, $sql);


    if (!mysqli_num_rows($result) > 0) {
        # code...
        array_push($errors, 'Kullanıcı Adı Hatalı');
        return $errors;
    }
    // write($result);
    $row = $result->fetch_assoc();
    $db_password = $row["user_password"];
    if (!password_verify($passwordControl, $db_password)) {
        array_push($errors, 'Şifre hatalı');
    }
    return $errors;
}

function validateForm($user)
{
    $errors = array();
    # code...
    if (empty($user['title'])) {
        # code...
        array_push($errors, 'Başlık Gerekli');
    }
    if (empty($user['category'])) {
        # code...
        array_push($errors, 'Kategori Gerekli');
    }
    if (empty($user['content'])) {
        # code...
        array_push($errors, 'İçerik Gerekli');
    }

    global $conn;
    // $sql = "SELECT * FROM users where user_email = '$emailControl' 
    // or user_name ='$usernameControl'";
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0) {
    //     array_push($errors, 'Kullanıcı Mevcut');
    // }
    return $errors;
}
