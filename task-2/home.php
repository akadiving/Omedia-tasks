<?php include_once 'methods.php'; ?>
<?php session_start() ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
    <?php include_once 'components/header.php' ?>
    
    <table>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php foreach (get_users() as $user): ?>
        <tr>
            <td><?php echo $user['name'];?></td>
            <td><?php echo $user['surname'];?></td>
            <td><?php echo $user['username'];?></td>
            <td>
                
                <a href="update.php?id=<?php echo $user['id'] ?>">Update</a>
                <a href="delete.php?id=<?php echo $user['id'] ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php include_once 'components/footer.php' ?>
</body>
</html>