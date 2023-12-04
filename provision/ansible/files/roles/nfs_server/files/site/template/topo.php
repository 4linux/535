<!doctype html>
<?php

include('include/utils.php');// o ponto barra volta um diretório
include('include/user.php');

?>
<html dir="ltr" lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Dexter Courier | Home</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="include/css/style.css">
              <!-- Le styles -->
        <link href="include/css/bootstrap.css" rel="stylesheet">
        <link href="include/css/bootstrap-responsive.css" rel="stylesheet">
        <script src="include/js/jquery.js"></script>
        <script src="include/js/bootstrap.js"></script>
        <script src="http://malsup.github.io/jquery.cycle.lite.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript">
           $('.carousel').carousel({
        	 interval:2000,
       	    pause: "false"
           });
        </script>
</head>
<body>
<div class="container">
	<a href="index.php" class="logo left">Dexter Courier</a>
	<nav class="right">
		<ul>
               <?php
                   $paginas[] = array('url' => 'index.php', 'label' => 'Home');
                   $paginas[] = array('url' => 'sobre.php', 'label' => 'Sobre a Dexter');
                   $paginas[] = array('url' => 'servicos.php', 'label' => 'Serviços');
                   $paginas[] = array('url' => 'cadastro.php', 'label' => 'Cadastre-se');
                   $paginas[] = array('url' => 'contato.php', 'label' => 'Contato');
               ?>

               <?php foreach ($paginas as $pagina):?>
                <li class=<?php  echo (basename($_SERVER['PHP_SELF']) == $pagina['url']) ? ' active' : '';?>><a href="<?php echo $pagina['url']; ?>"><?php echo $pagina['label']; ?></a>
              <?php endforeach; ?>
		</ul>
	</nav>
</div>