<?php
session_start();
include("db.php");
include("validateUser.php");
include("slugifi.php");
$username  = "";
$email  = "";
$password  = "";
$re_password  = "";
$errors = array();
$edited = false;

if (isset($_POST['register-btn'])) {
    $errors = validate($_POST);
    if (count($errors) == 0) {
        unset($_POST['register-btn'], $_POST['re_password']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $pass = $_POST['password'];
        $u_name = $_POST['username'];
        $email = $_POST['email'];
        $created_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO users (user_name, user_email, user_password, created_at)
    VALUES ('$u_name', '$email', '$pass', '$created_at')";
        if (mysqli_query($conn, $sql)) {
            // echo "New record created successfully";
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pass;
            $_SESSION['username'] = $u_name;
            $_SESSION['message'] = "Giriş Yapıldı";
            $_SESSION['type'] = "success";
            header('location: index.php');
            exit();
        } else
            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            mysqli_close($conn);
    } else {
        $username  = $_POST['username'];
        $email  = $_POST['email'];
        $password  = $_POST['password'];
        $re_password  = $_POST['re_password'];
    }
}

if (isset($_POST['login-btn'])) {
    # code...
    $errors = validateLogin($_POST);
    if (count($errors) === 0) {
        $pass = $_POST['password'];
        $u_name = $_POST['username'];
        session_start();
        $_SESSION['password'] = $pass;
        $_SESSION['username'] = $u_name;
        $_SESSION['message'] = "Giriş Yapıldı";
        $_SESSION['type'] = "success";
        header('location: index.php');
        exit();
    }
    // return $errors;
}

if (isset($_POST['newpost-btn'])) {    # code...
    $errors = validateForm($_POST);
    if (count($errors) != 0) {
        return $errors;
    }
    $titleControl = $_POST['title'];
    $categoryControl = $_POST['category'];
    $contentControl = $_POST['content'];
    $contentControl = str_replace('\'', '"', $contentControl);
    $post_url = randomURL();
    $created_at = date('Y-m-d H:i:s');

    $usernameControl = $_SESSION['username'];
    global $conn;
    $sql = "SELECT * FROM users 
    where user_name = '$usernameControl' 
    or user_email = '$usernameControl'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $user_id = $row["user_id"];

    $sql2 = "SELECT category_id FROM categories 
    where category_name = '$categoryControl'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = $result2->fetch_assoc();

    $category_id = $row2['category_id'];
    $sql3 = "INSERT INTO posts 
    (post_title, post_url, post_content, post_user_id, post_category_id, post_date)
    VALUES ('$titleControl', '$post_url', '$contentControl', 
    $user_id, $category_id , '$created_at')";
    if (mysqli_query($conn, $sql3)) {
        $_SESSION['message'] = "İçerik Eklendi";
        $_SESSION['type'] = "success";
        header('location: index.php');
        exit();
    }
    $_SESSION['message'] = "İçerik Eklenemedi";
    $_SESSION['type'] = "danger";
    return $errors;
}
global $conn;
$sql = "SELECT post_title, post_url, 
post_content, post_user_id, 
post_category_id, post_date, 
category_name, user_name
FROM posts 
join users on users.user_id = posts.post_user_id
join categories on categories.category_id = posts.post_category_id
ORDER by posts.post_date DESC";
$result = mysqli_query($conn, $sql);
$rows = $result->fetch_all();
$sql2 = "SELECT category_name FROM categories";
$result2 = mysqli_query($conn, $sql2);
$rows2 = $result2->fetch_all();

if (isset($_GET['url'])) {
    global $conn;

    $post_url = $_GET['url'];
    $sql = "SELECT post_title, post_url, 
    post_content, post_user_id, 
    post_category_id, post_date, 
    category_name, user_name
    FROM posts 
    join users on users.user_id = posts.post_user_id
    join categories on categories.category_id = posts.post_category_id 
    WHERE post_url = '$post_url'";
    $result_post = mysqli_query($conn, $sql);
    $rows_post = $result_post->fetch_assoc();
}


$sqlCategory = "SELECT category_name FROM categories";
$categories = mysqli_query($conn, $sqlCategory);
$categories = $categories->fetch_all();


if (isset($_GET['category'])) {
    global $conn;
    $category = $_GET['category'];
    global $conn;
    $sql = "SELECT post_title, post_url, 
    post_content, post_user_id, 
    post_category_id, post_date, 
    category_name, user_name
    FROM posts 
    join users on users.user_id = posts.post_user_id
    join categories on categories.category_id = posts.post_category_id
    Where category_name = '$category'
    ORDER by posts.post_date DESC";
    $result = mysqli_query($conn, $sql);
    $rows = $result->fetch_all();
}

if (isset($_GET['user'])) {
    global $conn;
    $user = $_GET['user'];
    global $conn;
    $sql = "SELECT post_title, post_url, 
    post_content, post_user_id, 
    post_category_id, post_date, 
    category_name, user_name
    FROM posts 
    join users on users.user_id = posts.post_user_id
    join categories on categories.category_id = posts.post_category_id
    Where user_name = '$user'
    ORDER by posts.post_date DESC";
    $result = mysqli_query($conn, $sql);
    $rows = $result->fetch_all();
}

if (isset($_GET['posturl'])) {
    global $conn;
    $posturl = $_GET['posturl'];
    $sql = "DELETE FROM posts WHERE post_url = '$posturl'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
    header('location: index.php');
}

if (isset($_GET['postedit'])) {
    global $conn;
    $postedit = $_GET['postedit'];

    $sql = "SELECT post_title, post_url, users.user_name,
    post_content FROM posts join users on users.user_id = posts.post_user_id
    where post_url = '$postedit'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    // write($row);


    $post_content = $row["post_content"];
    $post_title = $row["post_title"];
    $post_url = $row["post_url"];
    $user_name = $row["user_name"];
}
if (isset($_POST['editnewpost-btn'])) {
    global $conn;
    $editedTime = date('Y-m-d H:i:s');
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $post_url = $_POST['editnewpost-btn'];


    $sql2 = "SELECT category_id FROM categories 
    where category_name = '$category'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = $result2->fetch_assoc();
    $category_id = $row2["category_id"];
    $sql = "UPDATE posts JOIN categories 
    ON posts.post_category_id = categories.category_id
    SET 
    post_title='$title', 
    post_content='$content',
    post_category_id = $category_id,
    post_date = '$editedTime'
    WHERE post_url='$post_url'";

    if ($conn->query($sql) === TRUE) {
        header('location: index.php');
    } else {
        header('location: index.php');
    }

    $conn->close();
}
