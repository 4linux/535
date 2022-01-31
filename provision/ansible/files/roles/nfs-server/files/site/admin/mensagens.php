    <header class="header">
           <?php require 'topo.php';require 'checkLogin.php'; ?>
    </header>
    <div class="container">
    <div class="row">
    <div class="span12" style="margin-top:20px">
        <legend class="title">
            <h3>Lista de Mensagens</h3>
        </legend>

        <div class="well">
               <?php if(isset($_SESSION['fale_conosco'])): ?>
				       <div class="alert alert-danger">
				           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                 &times;
                            </button>
				            <?php
				                echo $_SESSION['fale_conosco'];
				                unset($_SESSION['fale_conosco']);
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
                        <td>Assunto</td>
                        <td style="width: 36px;">Ações</td>
                    </tr>
                    <?php foreach( listar('fale_conosco') as $registro ) { ?>
						<tr class="bold">
		                     <td><?php echo $registro['id'] ?></td>
		                     <td><?php echo $registro['nome'] ?></td>
		                     <td><?php echo $registro['email'] ?></td>
		                     <td><?php echo $registro['assunto'] ?></td>
		                     <td style="width: 36px;">
										<a href="verMensagem.php?id=<?php echo $registro['id'] ?>">
											<icon class="icon-eye-open"></i></a>
										<a href="excluirMensagem.php?id=<?php echo $registro['id'] ?>">
											<icon class="icon-remove"></i></a>
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
