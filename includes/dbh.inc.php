<?php
$conn = mysqli_connect("localhost", "root", "", "o_pepv2", 3306);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
