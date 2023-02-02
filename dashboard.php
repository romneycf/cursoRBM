<?php
session_start();
if($_SESSION['cpfusuario'] == ''){
    header('Location: login.php');
}
print_r($_SESSION);
?>