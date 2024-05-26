<?php
include ("../Config/connection.php");
$sql = "SELECT * FROM book2 WHERE active=1";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <a href="input_book.php" class="btn btn-primary">Add Book</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">title</th>
                    <th scope="col">author</th>
                    <th scope="col">description</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i =1; foreach ($rows as $row): ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><img style="max-width: 100px; max: height 100px;" class="img-thumbnail" src="../Public/img/book/<?php echo $row['image'] ?>" alt=""></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['author'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td>
                            <div class="d-flex">
                            <button class="btn btn-danger">Delete</button>
                            <a href="update_book.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            </div>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<script src="../dist/js/bootstrap.js"></script>