<?
    include '../models/cart_model.php';
    session_start();
    class Cart extends CartModel{
        public function getItem(){
            if(isset($_POST['buy'])){
                if($_SESSION['who'] == ''){    //Если не авторизован, кидаем на регистрацию или на авторизацию -куда угодно)
                    header('Location: ../views/regist_view.php');
                }
                else{
                $id_item = $_POST['id_item'];

                $cartmodel = new CartModel();
                $cartmodel->setItem($id_item);
                header('Location: ../views/cart_view.php');
                }
            }
        }
    }
    $cart = new Cart();
    $cart->getItem();
?>