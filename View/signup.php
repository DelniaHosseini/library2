<!DOCTYPE html>
<?php
if (isset($_GET['error'])) {
    $error = json_decode($_GET['error'], true);
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
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success show" role="alert">
                You have successfully registered.
            </div>
        <?php endif; ?>
        <h1>SIGN UP</h1>
        <form action="../Controller/UserController.php" method="post">
            <div class="form-group">
                <label for="fullname">Please enter your fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname"
                    placeholder="Enter your name and last name" value="<?php if (isset($inputs) && isset($inputs['fullname'])) {
                        echo $inputs['fullname'];
                    } ?>">
                <?php if (isset($errors) && isset($errors['fullname'])): ?>
                    <small style="color:red;"><?php echo $errors['fullname'] ?></small>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email*:</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    placeholder="Enter your email" value="<?php if (isset($inputs) && isset($inputs['email'])) {
                        echo $inputs['email'];
                    } ?>">
                <?php if (isset($errors) && isset($errors['email'])): ?>
                    <small style="color:red;"><?php echo $errors['email'] ?>
                    </small>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password*:</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password" value="<?php if (isset($inputs) && isset($inputs['password'])) {
                        echo $inputs['password'];
                    } ?>">
                <?php if (isset($errors) && isset($errors['password'])): ?>
                    <small style="color:red;"><?php echo $errors['password'] ?>
                    </small>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group">
                <label for="confirm_password">confirm password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                    placeholder="confirm password" value="<?php if (isset($inputs) && isset($inputs['password'])) {
                        echo $inputs['password'];
                    } ?>">

                <?php if (isset($errors) && isset($errors['password'])): ?>
                    <small style="color:red;"><?php echo implode($errors['confrim_password']) ?></small>
                <?php endif; ?>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="signup">SIGN UP</button>
            <a class="btn btn-dark" href="signin.php">SIGN IN</a>
        </form>
    </div>
</body>

</html>
<script src="../dist/js/bootstrap.js"></script>