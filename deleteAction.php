<?php
session_start();
require('config.php');

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $query = "DELETE FROM bookfield WHERE id=$id";
    $statement = $conn->query($query);

    header('location:index.php');
    $_SESSION['response'] = "Successfully Deleted";
    $_SESSION['res-type'] = "danger";
}
