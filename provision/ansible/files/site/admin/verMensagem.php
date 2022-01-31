    <header class="header">
            <?php

            	include('topo.php');
            	require 'checkLogin.php';
            	$registro = ver( 'fale_conosco', " id = {$_GET['id']}" );

            ?>
            <style type="text/css">
                textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input{
    	           padding: 10px;
                    height:auto;
                }
        </style>
    </header>
    <div class="container">
    <div class="row">
    <div class="span12" style="margin-top:20px">
        <legend class="title">
            <h3>Contato - <?php echo $registro['nome'] ?> </h3>
        </legend>

		<form action="#" method="post" class="form">
			<p>
				<label for="nome">Nome</label>
				<input  disabled = 'disabled' type="text" id="nome" name = "nome" value="<?php echo $registro['nome'] ?>" required>
			</p>
			<p>
				<label for="email">Email</label>
				<input  disabled = 'disabled' type="text" id="email" name = "email" value="<?php echo $registro['email'] ?>" required>
			</p>
			<p>
				<label for="assunto">Assunto</label>
				<input  disabled = 'disabled' type="text" id="assunto" name = "assunto" value="<?php echo $registro['assunto'] ?>" required>
			</p>

			<p>
				 <label for="mensagem">Mensagem</label>
				 <textarea  disabled = 'disabled' id="mensagem" name = "mensagem" rows="5"><?php echo $registro['mensagem'] ?></textarea>
			</p>
			<p>
				<button class="btn">Excluir</button>
			</p>
		</form>

    </div>
</div>
</div>

</body>

</html>
