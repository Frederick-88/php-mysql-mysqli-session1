<?php
session_start();
require('config.php');

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $query = ("INSERT INTO bookfield (title,author,year) VALUE ('$title','$author','$year')");
    $statement = $conn->query($query);

    // header untuk mengarahkan ke url, mcam gnti url/path gtu = useHistory di React
    header('location:index.php');
    $_SESSION['response'] = "Successfully Saved Record";
    $_SESSION['res-type'] = "primary";
}
