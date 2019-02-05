<?
    include '../models/addProduct_model.php';
    session_start();

    class Add{
        public function insert(){
            if(isset($_POST['addproduct'])){
                $name = $_POST['name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $who = $_SESSION['username'];
                $quantity = $_POST['quantity'];
                
                if(insertProduct::checkPrice($price) && insertProduct::checkQuantity($quantity)){   //проверка полей: количество и цена на int
                $add = new insertProduct();
                $add->insertPr($name, $description, $price, $who, $quantity);
                header("refresh:2; url=../views/ps_view.php");
                } else{
                    echo 'Price or Quantity should be number';
                    header("refresh:2; url=../views/ps_view.php");
                }
            }   
        }
    }
    $addController = new Add();
    $addController->insert();
?>