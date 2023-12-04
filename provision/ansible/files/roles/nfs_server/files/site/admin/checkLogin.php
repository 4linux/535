<?php
if(!$_SESSION['logado'] == true){
    header('location:login.php');
}