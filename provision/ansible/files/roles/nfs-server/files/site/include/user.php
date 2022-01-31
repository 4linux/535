<?php
	function logar ( $email, $senha ){//Faz a autenticação do usuário no banco
	//Login : email senha : senha armazenada no banco
		$retorno = ver( 'funcionarios', " email = '$email' and senha = '$senha' and prf_id = '1'" );
		if( $retorno ){
			$_SESSION['logado'] = true;
			$_SESSION['usuario'] = $retorno['nome'];
			$_SESSION['id'] = $retorno['id'];
			return true;
		}else{
			return false;
		} 
	}

	function deslogar(){  //Destroi as sessões de login ativa
		session_start();
		session_destroy();
		header('location:login.php');
	}

	function verificarLogin(){ // Verifica se o usuário está logado... direcionado para pagina correta
		if( isset( $_SESSION['logado'] ) ){
			return true;
		}else{
			return false;
		}
}