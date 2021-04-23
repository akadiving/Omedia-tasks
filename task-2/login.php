<?php if (empty($_POST)): ?>

<?php 
session_start();
include_once 'auth.php';
if(isset($_SESSION['username'])){
    redirect('home.php');
    die(0);
} ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <?php include_once 'components/header.php' ?>
    <form action="login.php" method="post">
        <div class="container">
            <h1>Login</h1>
            <p>Fill the form to login</p>
            <hr>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Username" name="username" id="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Password" name="password" id="password" required>

            <button type="submit" class="registerbtn">Login</button>
            <p>If you don't have an account, please <a href="register.php">Register</a></p>
        </div>
    </form>

<?php else: 
    include_once 'auth.php';
    login($_POST['username'], $_POST['password']);
    
    ?>
<?php endif ?>
<?php include_once 'components/footer.php' ?>
</body>
</html>

