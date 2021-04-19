<?php
/*
** Methods for user login/logout
*/


//login function takes 2 argument (username and password) and authenticates user
function login($username, $password){
    $data = file_get_contents("users.json");
    $users = json_decode($data, true)['users'];
    foreach ($users as $user){
        if ($user['username'] == $username){
            if (password_verify($password, $user['password'])){

                session_start();
                $_SESSION["username"] = $username;

                redirect('home.php');
                die(0);
            }else{
                //if password doesn't match, function will redirect user to login page
                redirect('login.php');
                die(1);
            }
        }
    }
    //if user not found, function will redirect user to login page
    redirect('login.php');
    die(1);
}

//Handles the logout of user, by removing session from server
function logout(){
    //Cheks if post request contains logout set
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout'])){
        session_start();
        session_unset();
        session_destroy();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 1, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        redirect('login.php');
        die(0);
    }   
}

//redirect function with relative path
function redirect(string $page){
    /* Redirect to a different page in the current directory that was requested */
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/$page");
    exit;
}
