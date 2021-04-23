<?php
/*
** Common Methods 
*/

//redirect function with relative path
function redirect(string $page){
    /* Redirect to a different page in the current directory that was requested */
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://$host$uri/$page");
    exit;
}

//Gets users from JSON and returns it as array
function get_users(): array {
    if(!file_exists('users.json')){
        print "users not found";
        die(1);
    }
    $data = file_get_contents("users.json");
    return json_decode($data, true);
}

//Gets user with mathing id
function get_user_by_id($id){
    $users = get_users();
    foreach ($users as $user){
        if ($user['id'] == $id){
            return $user;
        }
    }
    echo 'No such user';
    die(1);
}

//Updates user in json, by checking 'id' as an argument, from query parameter
function update_user($data, $id){
    $users = get_users();
    foreach ($users as $i => $user){
        if(!isset($_SESSION['username'])){
            redirect('login.php');
        }
        else if ($user['id'] == $id){
            $users[$i] = array_merge($user, $data);
        }
    }
    file_put_contents('users.json', json_encode($users));
    redirect('home.php');
}

//delets user from json, by checking 'id' as an argument, from query parameter
function delete_user($id){
    $users = get_users();

    foreach($users as $i => $user){
        if(!isset($_SESSION['username'])){
            redirect('login.php');
        }
        else if($user['id'] == $id){
            array_splice($users, $i, 1);
        }
    }
    file_put_contents('users.json', json_encode($users));
    redirect('home.php');
}