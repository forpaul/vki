<?
    include 'dbconnect_model.php';

    class insertProduct extends Dbconnect{
        public function insertPr($name, $description, $price, $who, $quantity){
            
            $sql = "INSERT INTO products (id, name, description, price, who, quantity) 
            VALUES ('',  '$name', '$description', '$price', '$who', '$quantity')";

                $checkName = "SELECT name FROM products WHERE name = '$name'";
                $result_check = $this->connect()->query($checkName);

                if(($result_check->num_rows) > 0){ //проверка на сущестование товара - если есть, просто увеличиваем количество
                    $updateQuantity = "UPDATE products SET quantity = quantity + '$quantity
                    WHERE who = '$_SESSION[username]'"; //количество++
                    $update = $this->connect()->query($updateQuantity);
                    echo 'Quantity change success';
            }
            else{
                $result = $this->connect()->query($sql); //иначе добавляем, как новый продукт
                echo 'Product success added';
                header('refresh:2; url=../views/ps_view.php');
            }
        }

        public static function checkPrice($price){ //проверки на целочисленный тип введенной цены и количества. Также можно проверить на float, если требуется
            $price = (int) $price;
            if($price > 1) return true;
            else return false;
        }
        public static function checkQuantity($quantity){
            $quantity = (int) $quantity;
            if($quantity > 1) return true;
            else return false;
        }
    }

?>