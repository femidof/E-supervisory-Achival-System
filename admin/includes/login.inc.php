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

        $sql = "SELECT * FROM admins WHERE uidAdmins=? OR emailAdmins=?;";
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
                $pwdCheck = password_verify($password, $row['pwdAdmins']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true){
                    session_start();
                    $_SESSION['adminid'] = $row['idAdmins'];
                    $_SESSION['adminUid'] = $row['uidAdmins'];

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
