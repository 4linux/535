<?php
		session_start();
		require_once 'config.php';
        	require_once 'banco.php';
        	//conectar();
		
		function verificarPagina( $link ){
			if( $link['url'] == basename( $_SERVER['PHP_SELF'] ) ){
				return true;
			}else{
				return false;
			}
		}

		function encurtar( $texto, $tamanho ){
			if( $tamanho < strlen( $texto ) ){
				 $texto = substr( $texto, 0, $tamanho );
				 return substr( $texto, 0, strrpos( $texto, " " ) );
			}else {
				return $texto;
			}

		}

		function validar( $post ){

			$erros = array();

			foreach( $post as $campo => $valor ){
				  if(  !$valor ) {
						$erros[] = $campo;
			     }
			}

			if( $erros ){

				return $erros;

			}else{

				return null;

			}
		}

?>