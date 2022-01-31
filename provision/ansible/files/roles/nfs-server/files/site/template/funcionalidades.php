<div class="title">
	<h1>Funcionalidades</h1>
	<h3>Uma plataforma moderna e flexivel para gerenciar a logistica do seu
		negócio</h3>
</div>
<ul class="container">
	<?php
		$registros = listar('funcionalidades');
		foreach( $registros as $registro ):

	 ?>
	<li>
		<figure>
			<img src="<?php echo $registro['url_icone'];?>" alt="Nome Imagem">
			<figcaption>
				<strong><?php echo $registro['nome'];?></strong>
				<p><?php echo $registro['descricao'];?></p>
			</figcaption>
		</figure>
	</li>
    <?php endforeach; ?>
</ul>