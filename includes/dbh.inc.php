<?php
$conn = mysqli_connect("localhost", "root", "", "opep_v2");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
