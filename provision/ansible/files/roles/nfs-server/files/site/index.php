<header class="header">
<?php  require 'template/topo.php'; ?>
    </header>
<?php
        $banners = array(
        	array(
                'id' => 1,
                'nome' => 'Logística Integrada',
        	    'descricao' => 'A transportadora Dexter Courier é responsável pela administração, movimentação e distribuição dos produtos importados em varias regiões do Brasil. Possui um modelo de organização e gestão da cadeia de suprimentos onde departamentos, processos, recursos e fluxos são coordenados para operar em sintonia.',
        	    'url' => 'img/banner/banner.jpg'
            ),

            array(
                'id' => 2,
                'nome' => 'Soluções em Transporte',
                'descricao' => 'Oferecemos diversas soluções em transportes, através de operações com cargas fracionadas e de lotação, sejam elas de transferências ou distribuição e operações de logística reversa. Atuamos na categorias de tranporte Marítimo, Rodoviário e Aéreo.',
                'url' => 'img/banner/banner2.jpg'
            ),

            array(
                'id' => 3,
                'nome' => 'Terminais Marítimos',
                'descricao' => 'Operamos através de terminais portuários, fluviais e lacustres, onde são embarcados e desembarcados contêineres. Contamos com grandes áreas para armazenagem e fluxo de nossos caminhões.',
                'url' => 'img/banner/banner3.jpg'
            ),

            array(
                'id' => 4,
                'nome' => 'Dexter - Logística',
		'descricao' => 'Cuidamos de todo transporte, armazenamento, recebimento e utilização dos materiais e produtos. Tudo isso visando gerar o mínimo de custo possível para a companhia e nossos clientes.',
                'url' => 'img/banner/banner4.jpg'
            ),


        )
?>
<section class="banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

          <!-- Wrapper for slides -->

          <div class="carousel-inner">
            <?php foreach ($banners as $banner): ?>
                <div class="item <?php echo ($banner['id']==1) ? 'active' : ''?>" style="background-image:url('<?php echo $banner['url']; ?>')">
                  <div class="container">
                    <div class="row">
                        <div class="span12">
                            <h2><?php echo $banner['nome']; ?></h2>
                            <p><?php echo $banner['descricao']; ?></p>
                        </div>
                    </div>
                  </div>
               </div>
<?php endforeach;?>
         </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
    </section>

    <section class="vantagens">
        <?php require 'template/vantagens.php' ?>
    </section>

    <section class="funcionalidades">
        <?php require 'template/funcionalidades.php' ?>
    </section>
<section class="cadastro">
        <div class="container">
            <div class="left">
                <h3>Você cuida da sua empresa e nós da sua logistica.</h3>
                <p>Cadastre-se agora e tenha 20% de desconto no primeiro ano.</p>
            </div>
            <a href="cadastro.php" class="btn btn-flat right">Cadastre-se</a>
        </div>
    </section>

    <footer class="footer">
        <?php require 'template/rodape.php' ?>
    </footer>
</body>
</html>
