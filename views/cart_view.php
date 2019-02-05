<?
    session_start();
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
    <div class="cart">
        <?
             include '../models/dbconnect_model.php';
             class ShowCart extends Dbconnect{
                 public function cart(){
                     $sql = "SELECT * FROM cart";
                     $result = $this->connect()->query($sql);
     
                     if(($result->num_rows) > 0){
                         while($row = $result->fetch_assoc()){
                             echo 'name:  ' . $row['name_product'] . ' : ' . $row['quantity'] . 'шт.' .'<br>';
                         }
                     }
                 }
             }
             $shows = new ShowCart();
             $shows->cart();
     
        ?>
    </div>
</body>
</html>