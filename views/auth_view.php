<?
    include '../controllers/auth_controller.php'
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="../controllers/auth_controller.php" method="post">
        <input type="text" name="login" id="" placeholder="Login">
        <input type="password" name="password" id="" placeholder="Password">
        <input type="submit" name="auth" value="Login">
    </form>
</body>
</html>