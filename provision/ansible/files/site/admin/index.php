<header class="header">
           <?php
        require 'topo.php';

        if (! verificarLogin()) {
            header('location:login.php');
        }

        ?>
    </header>
<div class="container">
	<div class="row">
		<div class="span12" style="margin-top: 20px">
			<legend class="title">
				<h3>Lista de Funcionalidades</h3>
			</legend>
			<div class="btn-toolbar">
				<a href="incluirFuncionalidade.php"><button class="btn btn-primary">
						+ Novo Funcionalidade</button></a>
			</div>
			<div class="well">
                <?php if(isset($_SESSION['funcionalidades'])): ?>
				       <div class="alert alert-<?= $_SESSION['tipo']?>">
				           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                 &times;
                            </button>
				            <?php
				                echo $_SESSION['funcionalidades'];
				                unset($_SESSION['funcionalidades']);

				            ?>
				       </div>
                <?php endif?>
            <table width="100%" class="table">
					<col style="width: 10%">
					<thead>
						<tr class="bold">
							<td>#</td>
							<td>Nome</td>
							<td>Descrição</td>
							<td>Ìcone</td>
							<td style="width: 36px;">Ações</td>
						</tr>
                     <?php
                    $registros = listar('funcionalidades');
                    foreach ($registros as $registro) {
                        ?>
							  <tr class="bold">
							<td><?php echo isset($registro['id']) ? $registro['id'] : ''; ?></td>
							<td><?php echo isset($registro['nome']) ? $registro['nome'] : ''; ?></td>
							<td><?php echo isset($registro['descricao']) ? $registro['descricao'] : ''; ?></td>
							<td><img src="../<?php echo isset($registro['url_icone']) ? $registro['url_icone'] : ''; ?>" width="30"
								height="30"></td>
							<td style="width: 36px;"><a
								href="alterarFuncionalidade.php?id=<?php echo isset($registro['id']) ? $registro['id'] : ''; ?>">
									<i class="icon-pencil"></i>
							</a> <a
								href="excluirFuncionalidade.php?id=<?php echo isset($registro['id']) ? $registro['id'] : ''; ?>">
									<i class="icon-remove"></i>
							</a></td>
						</tr>

						 <?php } ?>
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
