<?php
session_start();

unset($_SESSION['verified_user_id']);
unset($_SESSION['idTokenString']);

$_SESSION['status'] = "Logout Berhasil";
header("Location: index.php");
exit();

?>