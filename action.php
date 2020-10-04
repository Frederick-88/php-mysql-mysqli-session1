<?php
session_start();
require('config.php');

$update = false;
$id = "";
$title = "";
$author = "";
$year = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM bookfield WHERE id=$id";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    $id = $row['id'];
    $title = $row['title'];
    $author = $row['author'];
    $year = $row['year'];

    $update = true;
}
