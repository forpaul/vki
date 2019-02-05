<?  
    include '../models/dbconnect_model.php';
    
    class Users extends Dbconnect{

        public function setUser($login, $password, $username, $position, $whois, $sex){

            $sql = "SELECT * FROM users WHERE login = '$login'";
            $result_sql = $this->connect()->query($sql);

            if(($result_sql->num_rows) > 0){  //проверка на совпадение логинов. 
               echo 'Wait for redirect...';
               header('refresh:3; url=../views/regist_view.php');
            }else{
            $addUser = "INSERT INTO users (id, login, password, username, position, whois, sex)
            VALUES ('', '$login', '$password', '$username', '$position', '$whois', '$sex')";
            $result = $this->connect()->query($addUser);
            echo 'Registration is success';
            header('refresh:2; url=../views/index_view.php');
            }
        }
        //валидация пароля, логина и имя юзера
        public static function checkPassword($password){ 
            if (strlen($password) >= 6) return true;
            else return false;
        }

        public static function checkLogin($login){
            if(strlen($login) >= 4) return true;
            else return false;
        }

        public static function checkUsername($username, $login){
            if ((strlen($username) >= 4) && ($login != $username)) return true;
            else return false;
        }
    }
?>