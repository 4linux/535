    <header class="header">
           <?php
                require 'topo.php';

            	$registro = ver( 'funcionarios', " id={$_GET['id']}" );

            	if( $_POST ){
            		if( $_POST['senha'] == 'xxxxxx' ){
            			unset( $_POST['senha'] );
            		}else{
            			$_POST['senha'] = md5( $_POST['senha'] );
            		}
            		if( alterar('funcionarios', $_POST, " id={$_GET['id']}")){
            			header( 'location:funcionarios.php' );
            			exit();
            		}
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
            <h3>Alterar Funcionário</h3>
        </legend>
               <?php if(isset($_SESSION['funcionarios'])): ?>
				       <div class="alert alert-danger">
				           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                 &times;
                            </button>
				            <?php
				                echo $_SESSION['funcionarios'];
				                unset($_SESSION['funcionarios']);

				            ?>
				       </div>
                <?php endif?>
		<form action="#" method="post" class="form">
			<p>
				<label for="nome">Nome</label> <input type="text" name="nome"
					id="nome_razao" value="<?php echo $registro['nome'] ?>" required>
			</p>
			<p>
				<label for="email">Email</label> <input type="email" name="email"
					id="email" value="<?php echo $registro['email'] ?>" required>
			</p>
			<p>
				<label for="senha">Senha</label> <input type="password" name="senha"
					id="senha" value="xxxxxx" required>
			</p>

			<p>
				<label for="prf_id">Perfíl</label>
				 <select name="prf_id">
									 <?php foreach( listar('perfis') as $perfil ){ ?>
 <option value = "<?php echo $perfil['id'] ?>" <?php echo ( $perfil['id'] == $registro['prf_id'] ) ? 'selected = true' : '' ?>>
												<?php echo $perfil['nome'] ?>
											</option>
									 <?php } ?>
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
