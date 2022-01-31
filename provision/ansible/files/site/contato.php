<!doctype html>
<html dir="ltr" lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Dexter Courier | Fale Conosco</title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <?php
            require 'template/topo.php';
            if($_POST){
               if(inserir('fale_conosco', $_POST)){
                    $_SESSION['faleconosco'] = 'Sua mensagem foi enviada com sucesso!';
               }
            }

        ?>
    </header>

    <div class="container content">
            <div class="title center">
                <h1>Fale conosco</h1>
            </div>

            <div class="banner-fixed">
                <img src="img/banner-sobre.jpg" alt="Banner Sobre">
            </div>

                <?php if(isset($_SESSION['faleconosco'])): ?>
				       <div class="alert alert-success">
				           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                 &times;
                            </button>
				            <?php
				                echo $_SESSION['faleconosco'];
				                unset($_SESSION['faleconosco']);
				            ?>
				       </div>
                <?php endif?>
            <form action="#" method="post" class="form">
                <p>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" required>
                </p>
                <p>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="seu@email.com" required>
                </p>
                <p>
                    <label for="tel">Assunto</label>
                    <input type="text" name="assunto" id="assunto" required>
                </p>
                <p>
                    <label for="msg">Mensagem</label>
                    <textarea name="mensagem" id="msg" rows="5" placeholder="Sua mensagem..." required></textarea>
                </p>
                <p>
                    <button class="btn">Enviar</button>
                </p>
            </form>
    </div>

    <footer class="footer">
        <?php require 'template/rodape.php' ?>
    </footer>

</body>

</html>
