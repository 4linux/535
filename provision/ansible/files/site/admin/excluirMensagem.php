<?php
    require '../include/utils.php';
    require 'checkLogin.php';
    if(isset($_GET['id'])){
        excluir('fale_conosco', " id = {$_GET['id']}");
        header('location:mensagens.php');
    }

