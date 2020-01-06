<?php
    if(isset($_POST['signup-submit'])){

        require 'dbh.inc.php';

        $username =$_POST['register-username'];
        $email =$_POST['register-email'];
        $password =$_POST['register-password'];
        $passwordRepeat =$_POST['register-password-verify'];





        if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ){
            header("Location: ../signup.php?error=emptyfields&register-username=".$username."&register-email".$email);
            exit();
        }

        
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
           
            header("Location: ../signup.php?error=invalidregister-emailregister-username");
            exit();
           

        }



        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            header("Location: ../signup.php?error=invalidregister-email&register-username=".$username);
            exit();


        }

        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

            header("Location: ../signup.php?error=invalidregister-username&register-email=".$email);
            exit();
        }


        else if ($password !== $passwordRepeat) {

            header("Location: ../signup.php?error=passwordcheck&register-username=".$username."&register-email=".$email);
            exit();
        }
        else {
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();

            }

            else{

                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultcheck = mysqli_stmt_num_rows($stmt);
                if($resultcheck > 0){
                    header("Location: ../signup.php?error=usernametaken&register-mail=".$email);
                    exit();
                }
                else {

                    $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../signup.php?error=sqlerror");
                        exit();
        
                    }
                    else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                        exit();

                    }
        
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }
    else {

        header("Location: ../signup.php");
                        exit();

    }

