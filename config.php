<?php
$conn = new mysqli('localhost', 'root', '', 'librarycrud');

if ($conn->connect_error) {
    die('Could not connect the database' . $conn->connect_error);
}
