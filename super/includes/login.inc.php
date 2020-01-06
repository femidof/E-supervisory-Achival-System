<?php
if (isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

    if (empty($email) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
    exit();
    }
    else {

        $sql = "SELECT * FROM supervisors WHERE super_user=? OR super_email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['super_pass']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true){
                    session_start();
                    $_SESSION['superId'] = $row['super_id'];
                    $_SESSION['superUid'] = $row['super_user'];

                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }

}
else{

    header("Location: ../login.php");
    exit();

}
