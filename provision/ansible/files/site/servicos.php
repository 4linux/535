<!doctype html>
<html dir="ltr" lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Dexter Courier | Serviços</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
       <?php require 'template/topo.php' ?>
    </header>


    <section class="servicos">
        <div class="container content">
            <div class="title center">
                <h1>Nossos Serviços</h1>
                <h3>Não importa o tamanho  da sua empresa, a Dexter tem a solução certa para você.</h3>
            </div>
            <ul>
                <?php
            		$registros = listar('servicos','*',"home= 0");
            		foreach( $registros as $registro ):

	            ?>
                <li>
                        <a href="#"><img src="<?php echo $registro['url_icone'];?>" alt="">
                        <h2><?php echo $registro['nome'];?></h2>
                        <p><?php echo $registro['descricao'];?></p></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="mobile">
        <div class="container">
            <h2>A Dexter agora na sua mão</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, voluptas, veritatis earum quod saepe sed eaque tempore iure officia ea odit voluptatem minima blanditiis delectus illo ipsa ratione doloremque necessitatibus id veniam neque fugiat itaque ad magni repellat expedita non amet sequi dolores consequatur autem mollitia quaerat placeat harum cum.</p>
            <a href="#" class="btn btn-yellow">Android</a>
            <a href="#" class="btn btn-yellow">iPhone</a>

            <img src="img/iphone.jpg" alt="Dexter Mobile" class="phone">
        </div>
    </section>

    <footer class="footer">
       <?php require 'template/rodape.php' ?>
    </footer>

</body>

</html>
