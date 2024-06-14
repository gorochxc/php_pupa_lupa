<?php
    session_start();
    require_once('./include/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/footer.css" />
    <link rel="stylesheet" href="./styles/account.css" />
    <title>Document</title>
</head>
<body>
    <div class="accountPage">
        <?php if(!key_exists("user-name", $_SESSION)): ?>
            <?php header('Location: /index.php'); ?>
        <?php else: ?>
            <?php
                $username = $_SESSION["user-name"];

                $query = mysqli_query($connect, "SELECT * FROM `users` WHERE `name` = '$username'");
                $user = mysqli_fetch_row($query);
            ?>
            <h1>Account</h1>
            <div class="userData">
                <table>
                    <tbody>
                      <tr>
                        <td>ID:</td>
                        <td><?php echo $user[0] ?></td>
                      </tr>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo $user[1] ?></td>
                      </tr>
                      <tr>
                        <td>Login:</td>
                        <td><?php echo $user[2] ?></td>
                      </tr>
                    </tbody>
                </table>
                <a href="./vendor/logout.php"><button class="logoutButton" >Log out</button></a>
            </div>
        <?php endif; ?>
    </div>
</body>

<?php 
    include('./footer.php')
?>
</html>