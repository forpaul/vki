<?
    session_start();
    if ($_SESSION['who'] == 'buyer'){
        header('Location:index_view.php'); //ps_view.php и так не будет видно покупателям
        //но если кто-то узнает адрес страницы, хотелось бы предотвратить попадание покупателей на эту страницу
    
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile seller</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="../controllers/addProduct_controller.php" method="post">
        <input type="text" name="name" placeholder="Name product">
        <input type="text" name="description" placeholder="Description">
        <input type="text" name="price" placeholder="Price">
        <input type="text" name="quantity" placeholder="Quantity">
        <input type="submit" name="addproduct" value="Add product">
    </form>

    <div class="products">
    <?
    
        include '../models/dbconnect_model.php';
        class ShowPr extends Dbconnect{
            public function show(){
                
                $sql = "SELECT * FROM products WHERE who = '$_SESSION[username]'";
                $result = $this->connect()->query($sql);

                if(($result->num_rows) > 0){
                    while($row = $result->fetch_assoc()){
                        echo 'name:  ' . $row['name'] . ' : ' . $row['quantity'] . 'шт.' .'<br>';
                    }
                }
            }
        }
        $shows = new ShowPr();
        $shows->show();

    ?>
    </div>
</body>
</html>



