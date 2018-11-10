<?php
	function pegarConexao (){
		return mysqli_connect("mysql796.umbler.com:41890","ricardowebdev","ricardowebdev852","doesemfronteiras");

	}
	
    function cadastrarUsuario ($usuario)
    {
    	$conexao = pegarConexao();

        $sql = "INSERT INTO bilheteria_usuarios (login, 
                                                 senha) 
                VALUES ('".$usuario['login']."', 
                        '".$usuario['senha']."')";

        $preparador = mysqli_prepare($conexao, $sql);

        if(mysqli_execute($preparador)) {
        	return true;
        } else {
        	return false;
        }
    }

    function cadastrarCliente ($cliente)
    {
    	// pega a conexao com o banco de dados
    	$conexao = pegarConexao();

        // Comando sql para inserir já concatenando com as variaveis vindas do HTML
    	$sql = "INSERT INTO bilheteria_clientes (nome_cliente,
    											cpf_cliente)
				values('".$cliente['nome_cliente']."', 
                        '".$cliente['cpf_cliente']."')";
        
        // Prepara o comando para ser executado
        $preparador = mysqli_prepare($conexao, $sql);

        // Executa e retorna verdadeiro ou falso
        if(mysqli_execute($preparador)) {
        	return true;
        } else {
        	return false;
        }
    }

    function listaUsuarios()
    {
    	// pega a conexão com o banco de dados
    	$conexao = pegarConexao();

    	// sql para listar os dados dos ususarios
    	$sql = "SELECT * FROM usuarios";

    	// executa o select e grava o resultado
    	$resultado = mysqli_query($conexao, $sql);

    	// tratamento para retornar o resultado
    	if ($resultado->num_rows > 0) {
    		return $resultado;
    	} else {
    		return [];
    	}
    }

    function listaclientes()
    {
    	// pega a conexão com o banco de dados
    	$conexao = pegarConexao();

    	// sql para listar os dados dos ususarios
    	$sql = "SELECT * FROM clientes";

    	// executa o select e grava o resultado
    	$resultado = mysqli_query($conexao, $sql);

    	// tratamento para retornar o resultado
    	if ($resultado->num_rows > 0) {
    		return $resultado;
    	} else {
    		return [];
    	}
    }
