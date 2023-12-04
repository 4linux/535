<?php
    require '../include/utils.php';
    require 'checkLogin.php';
    if(isset($_GET['id'])){
        excluir('funcionalidades', " id = {$_GET['id']}");
        header('location:index.php');
    }

