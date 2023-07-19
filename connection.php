<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'placementdb';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        echo "error in establishing connection to database";
    }
?>