<?php
$conn = mysqli_connect("localhost", "root", "", "o'pep", 5307);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}