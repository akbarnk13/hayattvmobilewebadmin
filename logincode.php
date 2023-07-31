<?php
session_start();
include('dbcon.php');

if(isset($_POST['login_btn']))
{
    $email = $_POST ['email'];
    $clearTextPassword = $_POST ['password'];

    try {
        $user = $auth->getUserByEmail("$email");

        $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
        $idTokenString = $signInResult->idToken();

        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub');
            
            $_SESSION['verified_user_id'] = $uid;
            $_SESSION['idTokenString'] = $idTokenString;

            header("Location: index.php");
            exit();
            
        } catch (invalidToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        } catch (invalidArgumentException $e) {
            echo 'The token could not be parsed: '.$e->getMessage();
        }

    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        //echo $e->getMessage();
        $_SESSION['status'] = "Email Tidak Ditemukan";
        header("Location: login.php");
        exit();
    } catch (Kreait\Firebase\Exception\InvalidArgumentException $e) {
        //echo $e->getMessage();
        $_SESSION['status'] = "Email Tidak Ditemukan";
        header("Location: login.php");
        exit();
    } catch (\Kreait\Firebase\Auth\SignIn\FailedToSignIn $e) {
        //echo $e->getMessage();
        $_SESSION['status'] = "Password/Email Salah!";
        header("Location: login.php");
        exit();
    } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
        //echo $e->getMessage();
        $_SESSION['status'] = "Password Tidak Ditemukan";
        header("Location: login.php");
        exit();
    }
}

/// 

if(isset($_POST['resetpass']))
{
    $emaill = $_POST ['email'];
    try{
        $auth->sendPasswordResetLink($_POST ['email']);
        $_SESSION['status'] = "Password berhasil Direset Silahkan Buka Email";
        header("Location: login.php");
            exit();
    }catch (Kreait\Firebase\Auth\SendActionLink\FailedToSendActionLink $e){
        //echo $e->getMessage();
        $_SESSION['status'] = "Reset Password Gagal";
        header("Location: resetpassword.php");
        exit();
    }
}

?>