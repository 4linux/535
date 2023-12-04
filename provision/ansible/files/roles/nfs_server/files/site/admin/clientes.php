    <header class="header">
           <?php require 'topo.php';require 'checkLogin.php'; ?>
    </header>
    <div class="container">
    <div class="row">
    <div class="span12" style="margin-top:20px">
        <legend class="title">
            <h3>Lista de Clientes</h3>
        </legend>
        <div class="btn-toolbar">
            <a href="incluirCliente.php">
                <button class="btn btn-primary">Novo Cliente</button>
            </a>
        </div>
        <div class="well">
                <?php if(isset($_SESSION['clientes'])): ?>
				       <div class="alert alert-<?= $_SESSION['tipo']?>">
				           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                 &times;
                            </button>
				            <?php
				                echo $_SESSION['clientes'];
				                unset($_SESSION['clientes']);
				            ?>
				       </div>
                <?php endif?>
            <table width="100%" class="table">
                <col style="width:10%">
                <thead>
                    <tr class="bold">
                        <td>#</td>
                        <td>Nome/Razão</td>
                        <td>Cpf/CNPJ</td>
                        <td>Email</td>
                        <td>Telefone</td>
                        <td>Celular</td>
                        <td style="width: 36px;">Ações</td>
                    </tr>
                    <?php //inicio do codigo

							$registros = listar('clientes','id,nome_razao,cpf_cnpj,email,telefone,celular');
							foreach( $registros as $registro ){

						?>
					     <tr class="bold">
                        <td><?php echo isset($registro['id']) ? $registro['id'] : ''; ?></td>
                        <td><?php echo isset($registro['nome_razao']) ? $registro['nome_razao'] : ''; ?></td>
                        <td><?php echo isset($registro['cpf_cnpj']) ? $registro['cpf_cnpj'] : ''; ?></td>
                        <td><?php echo isset($registro['email']) ? $registro['email'] : ''; ?></td>
                        <td><?php echo isset($registro['telefone']) ? $registro['telefone'] : ''; ?></td>
                        <td><?php echo isset($registro['celular']) ? $registro['celular'] : ''; ?></td>
                        <td style="width: 36px;">
			<a href="alterarCliente.php?id=<?php echo $registro['id'] ?>"><i class="icon-pencil"> </i></a>
			<a href="excluirCliente.php?id=<?php echo $registro['id'] ?>"><i class="icon-remove"> </i></a>
								</td>
                    </tr>
					  <?php //fim do codigo
					    }
						?>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
</div>
</div>

</body>

</html>
