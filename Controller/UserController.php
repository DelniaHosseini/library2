<?php

include ("../Config/connection.php");

if (isset($_POST["signup"])) {

    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confrim_password = trim($_POST["cofirm_password"]);
    $inputs = ['fullname' => $fullname, 'email' => $email, 'password' => $password, 'confirm_password' => $confrim_password];
    $errors = [];

    //validation
    $fullname_result = preg_match("/^[a-zA-Z\s]+$/", $fullname);
    if ($fullname_result == false) {
        $errors['fullname'] = "full name not valid";
    }

    $email_result = preg_match("/^[a-z0-9A-Z][a-z0-9_\.-]*@[a-z0-9_\.-]+[a-z\.]$/", $email);
    if ($email_result == false) {
        $errors['email'] = "email not valid";
    }

    $password_result = preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password);
    if ($password_result == false) {
        $errors['password'] = "password not valid";
    }

    $confrim_password_result = preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $confrim_password);
    if ($confrim_password_result == false) {
        $errors['confrim_password'][] = "confrim password not valid";
    }

    if ($confrim_password != $password) {
        $errors['confrim_password'][] = "password and confrim password does not match.";
    }

    if (count($errors) == 0) {
        // echo "ok";
        $password = md5($password);
        $sql = "INSERT INTO user2 (full_name,email,password) VALUES ('$fullname','$email','$password')";
        $result = mysqli_query($conn, $sql);//run
        if ($result == true) {
            header("location:../View/signup.php?success=true");
        }
    } else {
        // var_dump($errors);
        $str = json_encode($errors);
        $str2 = json_encode($inputs);
        header("location:../View/signup.php?error=$str&input=$str2");
    }
}
else if(isset($_POST["signin"])){
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $inputs = ['email' => $email, 'password' => $password];
    $errors = [];

    $email_result = preg_match("/^[a-z0-9A-Z][a-z0-9_\.-]*@[a-z0-9_\.-]+[a-z\.]$/", $email);
    if ($email_result == false) {
        $errors['email'] = "email not valid";
    }
    $password_result = preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password);
    if ($password_result == false) {
        $errors['password'] = "password not valid";
    }

    if (count($errors) == 0) {
     $password = md5($password);
     $sql = "SELECT * FROM user2 WHERE email = '$email' and password = '$password'";
     $result = mysqli_query($conn, $sql);
     $count = mysqli_num_rows($result);
     if($count>0){
        $x = mysqli_fetch_row($result);
        // die(var_dump($x)); 
        session_start();
        $_SESSION["user_id"] = $x[0];
        header("location : ../View/test.php");
     }
     
    } else {
        // var_dump($errors);
        $str = json_encode($errors);
        $str2 = json_encode($inputs);
        header("location:../View/signin.php?error=$str&input=$str2");
    }
}