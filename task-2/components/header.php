<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<header>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <?php if (!isset($_SESSION['username'])):?>
            <li style="float:right" ><a href="login.php">Login</a></li>
            <li style="float:right" ><a href="register.php">Register</a></li>
            <?php else: include_once 'auth.php'; logout();?>
            <form action="home.php" method="post">
                <li style="float:right" ><a href=""><button class="list" type="submit" name="logout">Logout</button></a></li>
            </form>
            <?php endif ?>
        </ul>
    </nav>
</header>