<?php
    require '../include/utils.php';
    require 'checkLogin.php';
    if(isset($_GET['id'])){
        excluir('servicos', " id = {$_GET['id']}");
        header('location:servicos.php');
    }