<?php
    session_start();
    require "./connection.php";

    function doLogin($username) {
        global $conn;
        $query = "SELECT * FROM users WHERE username=?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    function errorMessage(){
        $_SESSION["error_message"] = "Login Failed";
        header("Location: ../login.php");
        die();
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        // die("Is Dead");
        
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $login_result = doLogin($username);
            if($login_result->num_rows < 1 || $login_result->num_rows > 1){
                errorMessage();
            }
            
            $data = $login_result->fetch_assoc();
            $isVerified = password_verify($password, $data['password']);
            
            if(!$isVerified){
                errorMessage();
            }
            
            $_SESSION['is_login'] = true;
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data["username"];
            $_SESSION["email"] = $data["email"];
    
            header("Location: ../index.php");
            die();
        }
        
        if(isset($_POST['logout'])){
            $_SESSION = array();
            $_SESSION['is_login'] = false;
            session_unset();
            
            // If it's desired to kill the session, also delete the session cookie.
            // Note: This will destroy the session, and not just the session data!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finally, destroy the session.
            session_destroy();
            
            header("Location: ../index.php");
            die();
        }

        if(isset($_POST['loginStatus'])){
            unset($_POST['loginStatus']);
            if($_SESSION['is_login'] === true){
                echo "isLoggedIn";
            }else{
                echo "IsNotLoggedIn";
            }
        }
    }

?>