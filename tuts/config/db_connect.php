<?php

$conn = mysqli_connect('localhost', 'bil', '1234', 'login_system');

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
?>