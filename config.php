<?php
$host = 'localhost:3306';
$user = '';
$pass = '';
$dbname = 'final_project';
$conn = mysqli_connect($host, "root", $pass, $dbname);
if(!$conn)
{
    echo 'Connection failed';
}