<?php
// if (!isset($_SESSION)) {
//     session_start();
// }
require('connect.php');

function write($value)
{
    # code...
    echo "<pre>", print_r($value, true), "</pre>";
}

function selectAll($table)
{
    # code...
    global $conn;
    $sql = "SELECT * FROM $table";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $records;
}


$categories = selectAll("categories");
// write($categories);