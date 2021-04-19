<?php
//Cheks if user is authenticated. If not, then redirects him/her on login page.
include_once 'methods.php';
session_start();
if(!isset($_SESSION['username'])){
    redirect('login.php');
    die(0);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home page</title>
</head>
<body>
<h1><?php echo "Welcome " . $_SESSION['username'];?></h1>
<form action="home.php" method="post">
    <button type="submit" name="logout" class="registerbtn">Logout</button>
</form>
<?php  
    include_once 'methods.php';
    logout();
    
?>
</body>
</html>

