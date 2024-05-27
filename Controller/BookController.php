<?php

include ("../Config/connection.php");

if (isset($_POST["input_book"])) {
    
    $title = trim($_POST["title"]);
    $author = trim($_POST["author"]);
    $description = trim($_POST["description"]);
    $inputs = [$title => 'title', $author => 'author', $description => 'description'];
    $errors = [];

    $title_result = preg_match("/^[a-zA-Z0-9\s]+$/", $title);
    if ($title_result == false) {
        $errors['title'] = "title name not valid";
    }

    $author_result = preg_match("/^[a-zA-Z\s]+$/", $author);
    if ($author_result == false) {
        $errors['author'] = "author name not valid";
    }

    if (empty(trim($description))) {
        $errors["description"] = "This field cannot be empty";
    }
    $description = strip_tags($description);


    $fileTmpPath = $_FILES['file']['tmp_name'];//موقت تو سروره

    $fileName = $_FILES['file']['name'];//اسم فایلی که اومده 

    $fileSize = $_FILES['file']['size'];// سایز فایل

    $fileType = $_FILES['file']['type'];// فرمت فایل

    $fileNameCmps = explode(".", $fileName); //با استفاده از نقطه جدا میکنیم

    $fileExtension = strtolower(end($fileNameCmps)); // بعد قسمت اخر ارایه رو برمیداریم

    $newFileName = time() . '.' . $fileExtension; // تولید اسم جدید و یونیک

    $valid_format = ['jpg', 'jpeg', 'png'];

    if (empty($fileName)) {
        $errors['file'][] = "image can not be empty";
    } else {
        if (!in_array($fileExtension, $valid_format)) {
            $errors['file'][] = "image format not vaild";
        }
        if (($fileSize / 1024) > 512) {
            $errors['file'][] = "image size not vaild";

        }
    }



    if (count($errors) == 0) {
        $uploadFileDir = '../Public/image/book/';
        $dest_path = $uploadFileDir . $newFileName;
        move_uploaded_file($fileTmpPath, $dest_path);
        $sql = "INSERT INTO book2 (title,author,description,image) VALUES ('$title' ,'$author' ,'$description','$newFileName') ";
        $result = mysqli_query($conn, $sql);
        header("location:../View/table.php");

    } else {
        $str = json_encode($errors);
        $str2 = json_encode($inputs);
        header("location:../View/input_book.php?error=$str&input=$str2");
    }
}else if(isset($_POST["update_book"])){

    $id = trim($_POST["update_book"]); //???چرا از اپدیت استفاده کردیم 
    $title = trim($_POST["title"]);
    $author = trim($_POST["author"]);
    $description = trim($_POST["description"]);
    $inputs = [$title => 'title', $author => 'author', $description => 'description'];
    $errors = [];

    $title_result = preg_match("/^[a-zA-Z0-9\s]+$/", $title);
    if ($title_result == false) {
        $errors['title'] = "title name not valid";
    }

    $author_result = preg_match("/^[a-zA-Z\s]+$/", $author);
    if ($author_result == false) {
        $errors['author'] = "author name not valid";
    }

    if (empty(trim($description))) {
        $errors["description"] = "This field cannot be empty";
    }
    $description = strip_tags($description);


    $fileTmpPath = $_FILES['file']['tmp_name'];//موقت تو سروره

    $fileName = $_FILES['file']['name'];//اسم فایلی که اومده 

    $fileSize = $_FILES['file']['size'];// سایز فایل

    $fileType = $_FILES['file']['type'];// فرمت فایل

    $fileNameCmps = explode(".", $fileName); //با استفاده از نقطه جدا میکنیم

    $fileExtension = strtolower(end($fileNameCmps)); // بعد قسمت اخر ارایه رو برمیداریم

    $newFileName = time() . '.' . $fileExtension; // تولید اسم جدید و یونیک

    $valid_format = ['jpg', 'jpeg', 'png'];

    if (!empty($fileName)) {

        // $errors['file'][] = "image can not be empty";

        if (!in_array($fileExtension, $valid_format)) {
            $errors['file'][] = "image format not vaild";
        }
        if (($fileSize / 1024) > 512) {
            $errors['file'][] = "image size not vaild";

        }
    }



    if (count($errors) == 0) {
        if (!empty($fileName)){
            $uploadFileDir = '../Public/image/book/';
            $dest_path = $uploadFileDir . $newFileName;
            move_uploaded_file($fileTmpPath, $dest_path);

            $sql = "UPDATE `book2` SET title ='$title' , author = '$author' , description = '$description' , image = '$newFileName' WHERE id = $id ";
            $result = mysqli_query($conn, $sql); 
        }else{
            $sql = "UPDATE `book2` SET title ='$title' , author = '$author' , description = '$description' WHERE id = $id ";
            $result = mysqli_query($conn, $sql);
        }
        
        
        header("location:../View/table.php");

    } else {
        $str = json_encode($errors);
       
        header("location:../View/update_book.php?id=$id&error=$str");
    }

}else if($_POST['delete_book']){
    $id = $_POST['delete_book'];

    $sql = "UPDATE `book2` SET active = 0 WHERE id = $id ";
    
    $result = mysqli_query($conn, $sql); 

    header("location:../View/table.php");
}