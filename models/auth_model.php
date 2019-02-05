<?
    include '../models/dbconnect_model.php';
    
    class CheckDataLogin extends Dbconnect{
        public function checkLogin($login, $password){

            $sql = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
            $result = $this->connect()->query($sql);

            if (($result->num_rows) > 0){
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
            while($row = $result->fetch_assoc()){
                $_SESSION['who'] = $row['whois']; //Продавец или покупатель
                $_SESSION['username'] = $row['username']; //Имя для отображения в продуктах
                echo $_SESSION['username'] . '<br>';
            }
                echo 'Auth success' . '<br>' . 'Wait for redirect...';
                header("refresh:2;url=../views/index_view.php");
            }
            else{
                echo 'Login not found';
                header("refresh: 2; url=../views/index_view.php");
            } 
        }
    }
?>