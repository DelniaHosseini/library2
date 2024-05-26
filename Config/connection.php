<?php

$conn =mysqli_connect("localhost","root","","library2");

if (!$conn){
    die("Connection Erorr : ". mysqli_connect_error());
}
