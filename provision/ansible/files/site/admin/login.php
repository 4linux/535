    <header class="header">
           <?php require 'topo.php' ?>
                <style type="text/css">
            textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input{
	           padding: 10px;
                height:auto;
            }
        </style>
    </header>
<form class="form-horizontal" action="" method="POST">
    <fieldset>
        <div id="legend">
            <legend class="">Autenticação</legend>
        </div>

        <div class="control-group">
            <?php if(isset($_SESSION['errorlogin'])): ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    &times;
                </button>
                <div class="alert alert-danger"><?php echo $_SESSION['errorlogin']; ?></div>
            <?php endif?>
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="username" name="email" placeholder="" class="input-xlarge">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Senha:</label>
            <div class="controls">
                <input type="password" id="password" name="senha" placeholder="" class="input-xlarge">
            </div>
        </div>


        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <button class="btn btn-success">Login</button>
            </div>
        </div>
    </fieldset>
    <?php
        if($_POST){

            if($registro = logar($_POST['email'], md5($_POST['senha']))){
                unset($_SESSION['errorlogin']);
                $_SESSION['logado']  = true;
                $_SESSION['usuario'] = $registro['nome'];
                header('location:index.php');
            }else{
                $_SESSION['errorlogin'] = 'Usuário ou senha inválidos, digite novamente';
            }
       }

    ?>
</form>
