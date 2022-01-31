<!doctype html>
<html dir="ltr" lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Dexter Courier | Cadastre-se</title>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,700'
	rel='stylesheet' type='text/css'>
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700'
	rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="header">
        <?php
            require 'template/topo.php';
            if($_POST){
               if(inserir('clientes', $_POST)){
                    $_SESSION['clientesfront'] = 'Cadastro efetuado com sucesso!';
               }
            }

        ?>
    </header>

	<div class="container content">
		<div class="title center">
			<h1>Cadastre-se</h1>
		</div>

		<div class="banner-fixed">
			<img src="img/banner-cadastro.jpg" alt="Banner Sobre">
		</div>
                <?php if(isset($_SESSION['clientesfront'])): ?>
				       <div class="alert alert-success">
				           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                 &times;
                            </button>
				            <?php
				                echo $_SESSION['clientesfront'];
				                unset($_SESSION['clientesfront']);
				            ?>
				       </div>
                <?php endif?>
		<form action="#" method="post" class="form">
			<p>
				<label for="nome">Nome/Razao</label> <input type="text" name="nome_razao"
					id="nome_razao" required>
			</p>
            <p>
				<label for="nome">Nome/Razao</label> <input type="text" name="cpf_cnpj"
					id="cpf_cjpj" required>
			</p>
			<p>
				<label for="email">Email</label> <input type="email" name="email"
					id="email" required>
			</p>
			<p>
				<label for="tel">Telefone</label> <input type="tel" name="telefone"
					id="telefone">
			</p>
			<p>
				<label for="cel">Celular</label> <input type="tel" name="celular"
					id="celular">
			</p>
			<p>
				<label for="cep">Cep</label> <input type="text" name="cep" id="cep"
					 required>
			</p>
			<p>
				<label for="endereco">Endereço</label> <input type="text"
					name="endereco" id="bai" required>
			</p>
			<p>
				<label for="bairro">Bairro</label> <input type="text" name="bairro"
					id="bairro" required>
			</p>
			<p>
				<label for="cidade">Cidade</label> <input type="text" name="cidade"
					id="cidade" required>
			</p>
			<p>
				<label for="Estado">Estado</label>
				 <select name="estado" id="estado">
					<option value="">Selecione</option>
					<option value="AC">AC</option>
					<option value="AL">AL</option>
					<option value="AP">AP</option>
					<option value="AM">AM</option>
					<option value="BA">BA</option>
					<option value="CE">CE</option>
					<option value="DF">DF</option>
					<option value="ES">ES</option>
					<option value="GO">GO</option>
					<option value="MA">MA</option>
					<option value="MT">MT</option>
					<option value="MS">MS</option>
					<option value="MG">MG</option>
					<option value="PA">PA</option>
					<option value="PB">PB</option>
					<option value="PR">PR</option>
					<option value="PE">PE</option>
					<option value="PI">PI</option>
					<option value="RJ">RJ</option>
					<option value="RN">RN</option>
					<option value="RS">RS</option>
					<option value="RO">RO</option>
					<option value="RR">RR</option>
					<option value="SC">SC</option>
					<option value="SP">SP</option>
					<option value="SE">SE</option>
					<option value="TO">TO</option>
				</select>
			</p>
			<p>
				<button class="btn">Enviar</button>
			</p>
		</form>
	</div>

	<footer class="footer">
        <?php require 'template/rodape.php'?>
    </footer>

</body>

</html>
