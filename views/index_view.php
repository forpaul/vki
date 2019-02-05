<? 
    
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="auth">
        <?
        if (!empty( $_SESSION['login'])&&( $_SESSION['password'])&&( $_SESSION['who'])){

            if ($_SESSION['login'] == 'admin'){
                echo '<a href="admin.php">Admin panel</a>' . ' ' .
                '<a href="dest.php">Log out</a>';
            }
            if ($_SESSION['who'] == 'seller'){
                echo '<a href="ps_view.php">Seller"s profile</a>' . ' ' .
                '<a href="dest.php">Log out</a>';
            }
            if($_SESSION['who'] == 'buyer'){
                echo '<a href="pb_view.php">Buyer"s profile</a>' . ' ' .
                '<a href="dest.php">Log out</a>';
            }
        }
            else{
            echo '<a href="auth_view.php">Login</a>' . '<br>' .
            '<a href="regist_view.php">Registration</a>' . ' ';
            }
        ?>
    </div>
    <div class="products-index" style="display: flex; margin: 30px auto;">
        <?
            include '../models/dbconnect_model.php';
            class ShowPr extends Dbconnect{
                public function show(){
                    
                    $sql = "SELECT * FROM products";
                    $result = $this->connect()->query($sql);

                    if(($result->num_rows) > 0){
                        while($row = $result->fetch_assoc()){
                            echo '<div class="product" style="width: 20%;">';
                            echo '<form action="../controllers/addcart_controller.php" method="post">';
                            echo '<p name="name">'.'Name:  ' . $row['name'] . '</p>';
                            echo $row['quantity'] . '<br>';
                            echo 'Description:  ' . $row['description'] . '<br>';
                            echo 'Price:  ' . $row['price'] . '<br>';
                            echo 'Added:  ' . $row ['who'] . '<br>';
                            echo '<input type="hidden" name="id_item" value="'.$row['id'].'">';
                            echo '<br><br>';
                            echo '<input type="submit" name="buy" value="Add to cart">';
                            echo '</form>';
                            echo '</div>';
                            
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