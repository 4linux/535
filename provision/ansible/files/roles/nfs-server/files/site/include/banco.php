<?php
		$link = mysqli_connect ( 'localhost', 'admin', '4linux', 'dexter500') or die ("Cloud not connect to mysql");
			
	function inserir($tabela, $dados){
		foreach( $dados as $campo => $valor ){//Separa o post em campos e valores
			$campos[]  = $campo;//Monta um array somente com os campos
			$valores[] = "'$valor'"; //Monta um array somente como os valores
		}
		$campos  = implode( ",", $campos );//Converte o array em string separando por virgula (Campos)
		$valores = implode( ",", $valores );//Converte o array em string separando por virgula (Valores)
		$sql = "insert into $tabela ( $campos ) values ( $valores )";
		$link = mysqli_connect ( 'localhost', 'admin', '4linux', 'dexter500') or die ("Cloud not connect to mysql");
		return mysqli_query( $link, $sql );//Insere o registro no banco
	}
	function alterar($tabela, $dados, $onde){
		foreach( $dados as $campo=>$valor ){
			$sets[] = "$campo = '$valor'";
		}
			$sets = implode( ",", $sets );
			$sql = "update $tabela set $sets where $onde ";
			//die($sql);
			$link = mysqli_connect ( 'localhost', 'admin', '4linux', 'dexter500') or die ("Cloud not connect to mysql");
			return mysqli_query( $link, $sql );
	}
	function excluir($tabela, $onde=null) {
		$sql = "delete from $tabela";
		if( $onde ){
			$sql .= " where $onde";
		}
		$link = mysqli_connect ( 'localhost', 'admin', '4linux', 'dexter500') or die ("Cloud not connect to mysql");
		return mysqli_query( $link, $sql );
	}
	function listar($tabela, $campos = "*", $onde=null, $filtro=null, $ordem=null, $limite=null){

                $sql = "select $campos from $tabela";

                if( $onde ){
                        $sql .= " where $onde"; //exemplo  nome = maria;
                }elseif( $filtro ){
                        $sql .= " where $filtro"; //exemplo nome like '%maria%'
                }

                if( $ordem ){
                        $sql .= " order by $ordem";
                }

                if( $limite ){
                        $sql .= " limit $limite";
                }
                $registros = [];
				$link = mysqli_connect ( 'localhost', 'admin', '4linux', 'dexter500') or die ("Cloud not connect to mysql");
                $query = mysqli_query( $link, $sql );
				
				while($registro = mysqli_fetch_array($query)){
                   $registros[] = $registro;
                }

                return $registros;
 }
	function ver($tabela, $onde, $campos = "*"){
			$sql = "select $campos from $tabela where $onde";
			$link = mysqli_connect ( 'localhost', 'admin', '4linux', 'dexter500') or die ("Cloud not connect to mysql");
			$query = mysqli_query( $link, $sql ); //prepara a consulta
			return mysqli_fetch_array( $query );//determina o tipo de retorno
}
