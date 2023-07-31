<?php
session_start();
include('dbcon.php');

use Firebase\Auth\Token\Exception\InvalidToken;

if(isset($_SESSION['verified_user_id']))
{
    $uid = $_SESSION['verified_user_id'];
    $idTokenString = $_SESSION['idTokenString']; 

    try {
        $verifiedIdToken = $auth->verifyIdToken($idTokenString);

        //echo "working";
    } catch (invalidToken $e) {
        echo 'The token is invalid: '.$e->getMessage();
        $_SESSION['status'] = "Token Invalid/Login Kembali";
        header("Location: logout.php");
        exit();
    } catch (invalidArgumentException $e) {
        echo 'The token could not be parsed: '.$e->getMessage();
    }
}
else
{
    $_SESSION['status'] = "Login untuk mengakses";
    header("Location: login.php");
    exit();
}

?>