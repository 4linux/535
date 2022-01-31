    <header class="header">
        <?php
                require 'topo.php' ;
                require 'checkLogin.php';
                	if( $_POST ){
		              $retorno = alterar('servicos',  $_POST, " id = '{$_GET['id']}'");
                	  if( $retorno ){
                			header('location:servicos.php');
                			exit();
                		}
                	}else{
                	    unset($_SESSION['error']);
                	    $registro = ver('servicos', " id = '{$_GET['id']}'");
                	}

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
            <h3>Alterar Serviço</h3>
        </legend>
                <?php if(isset($_SESSION['servicos'])): ?>
				       <div class="alert alert-danger">
				           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                 &times;
                            </button>
				            <?php
				                echo $_SESSION['servicos'];
				                unset($_SESSION['servicos']);

				            ?>
				       </div>
                <?php endif?>
		<form action="#" method="post" class="form" disabled="disabled">
			<p>
				<label for="nome">Nome</label> <input type="text" name="nome"
					id="nome" value="<?php echo $registro['nome'] ?>" required>
			</p>
			<p>
				<label for="email">Descrição</label> <input type="text" name="descricao"
					id="descricao" value="<?php echo $registro['descricao'] ?>" required>
			</p>
			<p>
				<label for="tel">Icone</label> <input type="text" name="url_icone"
					id="url_icone" value="<?php echo $registro['url_icone'] ?>" required>
			</p>
			<p>
				<label for="home">Exibir/Home</label>
				 <select name="home" id="home">
            		<option value="f" <?php echo ($registro['home'] == 'f') ? 'selected = true' : '' ?>>NÃO</option>
					<option value="t" <?php echo ($registro['home'] == 't') ? 'selected = true' : '' ?>>SIM</option>
				 </select>
			</p>
			<p>
				<button class="btn">Gravar</button>
			</p>
		</form>

    </div>
</div>
</div>

</body>

</html>
