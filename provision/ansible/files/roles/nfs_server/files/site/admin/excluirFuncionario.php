<?php
    require '../include/utils.php';
    require 'checkLogin.php';
    if(isset($_GET['id'])){
        excluir('funcionarios', " id = {$_GET['id']}");
        header('location:funcionarios.php');
    }

