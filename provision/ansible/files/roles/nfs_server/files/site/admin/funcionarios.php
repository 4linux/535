    <header class="header">
           <?php require 'topo.php';require 'checkLogin.php'; ?>
    </header>
    <div class="container">
    <div class="row">
    <div class="span12" style="margin-top:20px">
        <legend class="title">
            <h3>Lista de Funcionários</h3>
        </legend>
        <div class="btn-toolbar">
            <a href="incluirFuncionario.php"><button class="btn btn-primary">Novo Funcionário</button></a>
        </div>
        <div class="well">
                <?php if(isset($_SESSION['funcionarios'])): ?>
				       <div class="alert alert-<?= $_SESSION['tipo']; ?>">
				           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                 &times;
                            </button>
				            <?php
				                echo $_SESSION['funcionarios'];
				                unset($_SESSION['funcionarios']);
				            ?>
				       </div>
                <?php endif?>
            <table width="100%" class="table">
                <col style="width:10%">
                <thead>
                    <tr class="bold">
                        <td>#</td>
                        <td>Nome</td>
                        <td>E-mail</td>
                        <td>Perfil</td>
                        <td style="width: 36px;">Ações</td>
                    </tr>
                     <?php
						 $registros = listar( 'funcionarios' );
						 foreach( $registros as $registro ) {
					 ?>
							  <tr class="bold">
                        <td><?php echo $registro['id'] ?></td>
                        <td><?php echo $registro['nome'] ?></td>
                        <td><?php echo $registro['email'] ?></td>
                        <td>
							<?php
								$nome_perfil = ver( 'perfis', " id = '{$registro['prf_id']}'","nome");
								echo $nome_perfil['nome'];
							?>
					   </td>
                        <td style="width: 36px;">
									<a href="alterarFuncionario.php?id=<?php echo $registro['id'] ?>">
									 <i class="icon-pencil"></i></a>
									<a href="excluirFuncionario.php?id=<?php echo $registro['id'] ?>">
									 <i class="icon-remove"></i></a>
								</td>
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
