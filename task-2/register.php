
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registartion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include_once 'components/header.php' ?>
    <form action="register.php" method="post">
        <div class="container">
            <h1>Register</h1>
            <p>Fill the form to register</p>
            <hr>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter the name" name="name" id="name" required>

            <label for="surname"><b>Surname</b></label>
            <input type="text" placeholder="Enter the surname" name="surname" id="Surname" required>


            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Username" name="username" id="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Password" name="password" id="password" required>

            <button type="submit" class="registerbtn">Register</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </form>
    <?php
    include_once 'auth.php';
    function create_user(){
        //creates new user, by geting information from form and pushing it to a JSON file
        session_start();
        
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
                
            //executes next lines if the password matches to confirm-password
            $users = file_get_contents("users.json", true);
            $data = json_decode($users, true);
            // Get last id
            $last = end($data);
            // Get unique id
            $id = $last['id'];

            $new_user = array(
                "id"        => ++$id,
                "name"      => $_POST['name'],
                "surname"   => $_POST['surname'],
                "password"  => password_hash($_POST['password'], PASSWORD_BCRYPT),
                "username"  => $_POST['username'],
            );

            array_push($data, $new_user);
    
            $jsonData = json_encode($data);
            
            file_put_contents('users.json', $jsonData);
    
            redirect('home.php');
            die(0);
        }    
    }
    create_user();
    ?>
<?php include_once 'components/footer.php' ?>
</body>
</html>
