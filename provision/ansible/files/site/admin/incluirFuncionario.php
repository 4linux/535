    <header class="header">
           <?php
                require 'topo.php';
                require 'checkLogin.php';

                if($_POST){
                    if(inserir('funcionarios', $_POST)){
                        header('location:funcionarios.php');
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
            <h3>Incluir Funcionário</h3>
        </legend>

		<form action="#" method="post" class="form">
			<p>
				<label for="nome">Nome</label> <input type="text" name="nome"
					id="nome" required>
			</p>
			<p>
				<label for="email">Email</label> <input type="email" name="email"
					id="email" required>
			</p>
			<p>
				<label for="tel">Senha</label> <input type="password" name="senha"
					id="telefone" required>
			</p>

			<p>
				<label for="prf_id">Perfíl</label>
				 <select name="prf_id" id="prf_id">
				    <?php
				        $perfis = listar('perfis');
				        foreach ($perfis as $perfil):
				    ?>
					   <option value="<?php echo $perfil['id']?>">
					       <?php echo $perfil['nome']?>
					   </option>

					<?php endforeach; ?>
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
