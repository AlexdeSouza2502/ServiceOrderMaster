<?php

require_once("conecta_bd.php");



function listaServicos(){
    $conexao  = conecta_bd();
    $servicos = array();       // Corrigido para $servicos ao invés de $servico
    $query    = "select *
              from servico
              order by nome";

    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)){
        array_push($servicos, $dados);
    }
    return $servicos;
}

function buscaUsuario($email){
    $conexao = conecta_bd();
    $query   = "select *
              from usuario
              where email='$email'";

    $resultado = mysqli_query($conexao, $query);
    $dados     = mysqli_num_rows($resultado);

    return $dados;
}

function cadastraServico($nome, $valor, $data){
    $conexao   = conecta_bd();
    $query     = "INSERT INTO servico(nome, valor, data) VALUES ('$nome', '$valor', '$data')";
    $resultado = mysqli_query($conexao, $query);
    $dados     = mysqli_affected_rows($conexao);
    return $dados;
}


function removeServico($codigo){
    $conexao = conecta_bd();
    $query   = "delete from usuario where cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados     = mysqli_affected_rows($conexao);

    return $dados;

}

function buscaServicoeditar($codigo){
    $conexao = conecta_bd();
    $query   = "select *
              from servico
              where cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados     = mysqli_fetch_array($resultado);

    return $dados;

}

function editarServico($codigo, $nome, $valor, $data){
    $conexao = conecta_bd();
    
      // Verifica se o serviço com o código existe
    $query = "SELECT *
              FROM servico
              WHERE cod = '$codigo'";
    
    $resultado = mysqli_query($conexao, $query);
    $dados     = mysqli_num_rows($resultado);
    
    if($dados == 1){
          // Atualiza o serviço
        $query = "UPDATE servico
                  SET   nome = '$nome', valor = '$valor', data = '$data'
                  WHERE cod  = '$codigo'";
        
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);
        
        return $dados;
    } else {
        // Caso o serviço não seja encontrado
        return 0; // Ou outra forma de indicar que não foi possível editar
    }
}



?>