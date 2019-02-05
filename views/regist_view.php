<?
    include '../controllers/regist_controller.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Регистрация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="../controllers/regist_controller.php" method="post" name="registration">
        <input type="text" name="login" id="" placeholder="login">
        <input type="password" name="password" id="" placeholder="password">
        <input type="text" name="username" id="" placeholder="username">
        <input type="email" name="email" id="" placeholder="email">
        <select name="position" id="">
            <option value="Novosibirsk">Novosibirsk</option>
            <option value="Moscow">Moscow</option>
            <option value="Krasnoyarsk">Krasnoyarsk</option>
            <option value="Samara">Samara</option>
        </select>
        <select name="whois" id="">
            <option value="seller">Seller</option>
            <option value="buyer">Buyer</option>
        </select>
        <select name="sex" id="">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <input type="submit" name="adduser" value="Registration">
    </form>
</body>
</html>