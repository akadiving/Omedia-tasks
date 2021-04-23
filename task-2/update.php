<?php
session_start(); 
include_once 'methods.php';
if (!isset($_GET['id'])){
    include 'components/not_found.php';
    exit;
}

$user_id = $_GET['id'];

$user = get_user_by_id($user_id);
if(!$user){
    include 'components/not_found.php';
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    update_user($_POST, $user_id);
}
?>

<?php include_once 'components/header.php' ?>
<form method="post" action="">
<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Username</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>
            <input type="text" style="background-color: white" name="name" value="<?php echo $user['name'];?>">
        </td>
        <td>
            <input type="text" style="background-color: white" name="surname" value="<?php echo $user['surname'];?>">
        </td>
        <td>
            <input type="text" style="background-color: white" name="username" value="<?php echo $user['username'];?>">
        </td>
        <td>
            <button class="update" type="submit">Update</button>
        </td>
    </tr>
</form>
<?php include_once 'components/footer.php' ?>