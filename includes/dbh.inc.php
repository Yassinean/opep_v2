<?php
$conn = mysqli_connect("localhost", "root", "", "o'pep", 3306);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
