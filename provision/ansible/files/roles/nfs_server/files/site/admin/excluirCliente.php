<?php
    require '../include/utils.php';
    require 'checkLogin.php';
    if(isset($_GET['id'])){
        excluir('clientes', " id = {$_GET['id']}");
        header('location:clientes.php');
    }

