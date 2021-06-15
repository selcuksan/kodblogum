<?php

$host = 'localhost';
$user = '284058';
$pass = 'x9F3e.n4h8!Gt5c';
$db_name = '284058';
$conn = new MySQLi($host, $user, $pass, $db_name);
if ($conn->connect_error) {
    # code...
    die('error');
}
?>

<?php

// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $db_name = 'phpblogdb';
// $conn = new MySQLi($host, $user, $pass, $db_name);
// if ($conn->connect_error) {
//     # code...
//     die('error');
// }
?>