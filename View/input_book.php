<?php
if (isset($_GET['error'])) {
    $errors = json_decode($_GET['error'], true);
    $inputs = json_decode($_GET['input'], true);
}
?>

<!DOCTYPE html>
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
        <form method="post" action="../Controller/BookController.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                    placeholder="Enter Title" value="<?php if (isset($inputs) && isset($inputs['title'])) {
                        echo $inputs['title'];
                    } ?>">
                <?php if (isset($errors) && isset($errors['title'])): ?>
                    <small style="color:red;"><?php echo $errors['title'] ?></small>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" class="form-control" id="author" name="author" aria-describedby="emailHelp"
                    placeholder="Enter Author" value="<?php if (isset($inputs) && isset($inputs['author'])) {
                        echo $inputs['author'];
                    } ?>">
                <?php if (isset($errors) && isset($errors['author'])): ?>
                    <small style="color:red;"><?php echo $errors['author'] ?></small>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="description">description :</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                <?php if (isset($errors) && isset($errors['description'])): ?>
                    <small style="color:red;"><?php echo $errors['description'] ?></small>
                <?php endif; ?>
            </div>
            <br>

            <div class="mb-3">
                <label for="file" class="form-label">File:</label>
                <input class="form-control" type="file" id="file" name="file" placeholder="Select the file you want">
                <?php if (isset($errors) && isset($errors['file'])): ?>
                    <small style="color:red;"><?php echo implode(' ',$errors['file']) ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" name="input_book" class="btn btn-primary">Add</button>
        </form>
    </div>
</body>

</html>
<script src="../dist/js/bootstrap.js"></script>









































<!-- <!DOCTYPE html> -->

<!-- <?php
if (isset($_GET['error'])) {
    $errors = json_decode($_GET['error'], true);
    $inputs = json_decode($_GET['input'], true);
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
                    placeholder="Enter book title" value="<?php if (isset($inputs) && isset($inputs['title'])) {
                        echo $inputs['title'];
                    } ?>">
                <?php if (isset($errors) && isset($errors['title'])): ?>
                    <small style="color:orange;"><?php echo $errors['title'] ?></small>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="author">Author :</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="Enter book author" value="<?php if (isset($inputs) && isset($inputs['author'])) {
                    echo $inputs['author'];
                } ?>">
                <?php if (isset($errors) && isset($errors['author'])): ?>
                    <small style="color:orange;"><?php echo $errors['author'] ?></small>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="description">description :</label>
                <textarea class="form-control" name="description" id="description" rows="3"><?php if (
                    isset($inputs) && isset($inputs
                    ['description'])
                ) {
                    echo $inputs['description'];
                } ?></textarea>
                <?php if (isset($errors) && isset($errors['description'])): ?>
                    <small style="color:orange;"><?php echo $errors['description'] ?></small>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="file">file input :</label>
                <input type="file" class="form-control-file" name="file" id="file">
                <?php if (isset($errors) && isset($errors['file'])): ?>
                    
                    <small style="color:red;"><?php echo implode($errors['file']) ?></small>
                <?php endif; ?>
            </div>
            <br>
            <button type="submit" name="input_book" class="btn btn-primary">Add</button>
            <a href="table.php" class="btn btn-secondary">Return</a>
        </form>
    </div>
</body>

</html>
<script src="../dist/js/bootstrap.js"></script> -->