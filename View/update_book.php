<?php
include ("../Config/connection.php");

// var_dump($_GET['id']);
$id = $_GET['id'];
$sql = "SELECT * from book2 where active=1 and id = $id ";
$result = mysqli_query($conn , $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<?php
if (isset($_GET['error'])) {
    $errors = json_decode($_GET['error'], true);
    // $inputs = json_decode($_GET['input'], true);
}
?>
<html lang="en">

<head>
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Registration of books</h1>
        <form action="../Controller/BookController.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title :</label>
                <input type="title" class="form-control" name="title" id="tilte" aria-describedby="emailHelp"
                    placeholder="Enter book title" value="<?php echo $row['title']; ?>">
                <?php if (isset($errors) && isset($errors['title'])): ?>
                    <small style="color:orange;"><?php echo $errors['title'] ?></small>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="author">Author :</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="Enter book author" value="<?php 
                    echo $row['author']; ?>">
                <?php if (isset($errors) && isset($errors['author'])): ?>
                    <small style="color:orange;"><?php echo $errors['author'] ?></small>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="description">description :</label>
                <textarea class="form-control" name="description" id="description" rows="3"><?php echo $row['description'];?></textarea>
                <?php if (isset($errors) && isset($errors['description'])): ?>
                    <small style="color:orange;"><?php echo $errors['description'] ?></small>
                <?php endif; ?>
            </div>
            <br>
            <img src="../Public/image/book/<?php echo $row['image']; ?>" style="max-width:400px;max-height:400px;" alt="..." class="img-thumbnail">
            <div class="form-group">
                <label for="file">file input :</label>
                <input type="file" class="form-control-file" name="file" id="file">
                <?php if (isset($errors) && isset($errors['file'])): ?>
                    
                    <small style="color:red;"><?php echo implode($errors['file']) ?></small>
                <?php endif; ?>
            </div>
            <br>
            <button type="submit" value="<?php echo $row['id']; ?>" name="update_book" class="btn btn-primary">Add</button>
            <a href="table.php" class="btn btn-secondary">Return</a>
        </form>
    </div>
</body>

</html>
<script src="../dist/js/bootstrap.js"></script>