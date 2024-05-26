<?php
session_start();

function checkLogin(){
    if (!isset($_SESSION["user_id"])){
        header("location:../View/signin.php");
    }
}
function getUser(){
    if(isset($_SESSION["user_id"])){
        return $_SESSION["user_id"];
    }
}