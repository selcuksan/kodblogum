<?php
if (!isset($_SESSION)) {
    session_start();
}
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['username']);
unset($_SESSION['message']);
unset($_SESSION['type']);
session_destroy();
header('location: login.php');
