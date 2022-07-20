<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Military Communication Equipment Repair and Management Shop</title>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <?php
    $_SESSION['login']=1;
    $_SESSION['ulogin'] = false;
    ?>
    <div class="project-name">
        <h1>MILITARY COMMUNICATION EQUIPMENT REPAIR AND MANAGEMENT SYSTEM</h1>
    </div>
    <div class="form">
        <form action="Login-valid-check.php" class="login-form" method="post">
            <input type="text" name="userid" placeholder="User ID" required>
            <input type="password" name="pass" placeholder="Password" id="myInput">
            <button action="admin.php" name="save" type="submit">login</button>
        </form>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="./assets/js/login.js"></script>
</body>

</html>