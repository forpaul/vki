<?
    include 'dbconnect_model.php';

    class CartModel extends Dbconnect{
        public function setItem($id_item){
            $sql = "SELECT * FROM products WHERE id = '$id_item'";
            $result = $this->connect()->query($sql);
            $quantity = 1; //задаём начальное количество при срабатывании submit и + 1 каждый раз
            if(($result->num_rows) > 0){
                while($row = $result->fetch_assoc()){
                    $_SESSION['cart'] = $row;  
                }
                //echo $_SESSION['cart']['name'];
            }
            $checkItem = "SELECT * FROM cart WHERE id = '$id_item'"; //Здесь проверяем, есть ли товар уже в корзине, в таком случае, увеличиваем количество на единицу
            $result_check = $this->connect()->query($checkItem);
            if(($result_check->num_rows) > 0){
                while($row_check = $result_check->fetch_assoc()){
                    if ($row_check['who'] == $_SESSION['username']){
                        $updateQuantity = "UPDATE cart SET quantity = quantity + 1 WHERE id = '$id_item'";
                        $update = $this->connect()->query($updateQuantity);
                    }
                }
            }
            else{ //иначе, добавляем в корзину, все поля
                $insertCart = "INSERT INTO cart (id, name_product, description, price, who, quantity)
                SELECT name, description, price, '".$_SESSION['username']."', '$quantity'  FROM products WHERE id = '$id_item'";
                $resultInsert = $this->connect()->query($insertCart);    
            }
        }
    }
?>