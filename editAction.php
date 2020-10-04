<?php
session_start();
require('config.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    // PDO way
    // $query = ("UPDATE bookfield SET title='$title', author='$author', year='$year' WHERE id=$id");
    // $statement = $conn->prepare($query);
    // $statement->execute();

    // Mysqli way - better
    $query = ("UPDATE bookfield SET title='$title', author='$author', year='$year' WHERE id=$id");
    $conn->query($query);

    header('location:index.php');
    $_SESSION['response'] = "Successfully Updated Record";
    $_SESSION['res-type'] = "success";
}
