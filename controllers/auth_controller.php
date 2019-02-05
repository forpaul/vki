<?

    include '../models/auth_model.php';

    class Auth{
        public function checkData(){

            if(isset($_POST['auth'])){
                $login = $_POST['login'];
                $password = $_POST['password'];

                $check = new CheckDataLogin();
                $check->checkLogin($login, $password);
                
            }
        }
    }
    $auth = new Auth();
    $auth->checkData();

?>