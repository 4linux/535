<!doctype html>
<html dir="ltr" lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Dexter Courier | Home</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../include/css/style.css">
          <!-- Le styles -->
        <link href="../include/css/bootstrap.css" rel="stylesheet">
        <link href="../include/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="../include/js/jquery.js"></script>
        <script src="../include/js/bootstrap.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>
<body>
<?php

include('../include/utils.php');// o ponto barra volta um diretório
include('../include/user.php');

?>
<div class="container">
	<a href="../index.php" class="logo left">Dexter Courier</a>
     <div class="btn-group pull-right">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                 						<i class="icon-user"></i>
					                          <?php echo ( isset( $_SESSION["usuario"] ) ) ? $_SESSION["usuario"] : '' ?>
											<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-wrench"></i> Opções</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="icon-share"></i> Logout</a></li>
                        </ul>
                    </div>
	<nav class="right" style="margin-top:80px">
		<ul>
			<li><a href="../index.php">Home</a></li>
			<li><a href="funcionarios.php">Funcionários</a></li>
			<li><a href="clientes.php">Clientes</a></li>
			<li><a href="servicos.php">Serviços</a></li>
			<li><a href="index.php">Funcionalidades</a></li>
			<li><a href="mensagens.php">Mensagens</a></li>

		</ul>

	</nav>
</div>

