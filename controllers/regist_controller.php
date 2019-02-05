<?
    include '../models/regist_model.php';
    
class Regist{
    public function actionAdd(){
        if (isset($_POST['adduser'])){

            $login = $_POST['login'];
            $password = $_POST['password'];
            $username = $_POST['username'];
            $position = $_POST['position'];
            $whois = $_POST['whois'];
            $sex = $_POST['sex'];

            
        if((Users::checkPassword($password)) && (Users::checkLogin($login)) && (Users::checkUsername($username, $login))){ //выозов функций проверки данных
            $set = new Users();
            $set->setUser($login, $password, $username, $position, $whois, $sex);
        }
        else{
            if (!Users::checkPassword($password)) echo 'Incorrect password' . '<br>'; //Errors
            if (!Users::checkLogin($login)) echo 'Incorrect login' . '<br>';
            if (!Users::checkUsername($username, $login)) echo 'Username and Login should be different' . '<br>';
            
        }
    };

}
}
$regist = new Regist(); 
$regist->actionAdd();
?>