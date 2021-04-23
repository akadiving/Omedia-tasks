<?php
session_start(); 
require 'methods.php';

/* Checks the validity of comming argument. If id is not given, or is not valid
** shows 'NOT FOUND' component
*/
if(!isset($_GET['id'])){
    include_once 'components/not_found.php'; 
    exit;
}

//takes an id from global GET variable
$user_id = $_GET['id'];
delete_user($user_id);