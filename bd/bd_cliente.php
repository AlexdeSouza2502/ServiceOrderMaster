<?php

require_once("conecta_bd.php");

function cadastraCliente($nome, $email, $senha, $endereco, $numero, $bairro, $cidade, $telefone, $status, $perfil, $data) {
    $conexao  = conecta_bd();
    $senhaMd5 = md5($senha);

    $query = "Insert Into cliente (nome, email, senha, endereco, numero, bairro, cidade, telefone,status,perfil,data) values ('$nome', '$email', '$senhaMd5', '$endereco', '$numero', '$bairro', '$cidade', '$telefone', '$status', '$perfil', '$data')";

    $resultado = mysqli_query($conexao, $query);
    $dados     = mysqli_affected_rows($conexao);

    return $dados;
}

function listaUsuarios() {
    $conexao  = conecta_bd();
    $clientes = array();
    $query    = "select * from cliente order by nome";

    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)) {
        array_push($clientes, $dados);
    }
    return $clientes;
}

function buscaCliente($email) {
    $conexao = conecta_bd();
    $query   = "select * from cliente where email='$email'";

    $resultado = mysqli_query($conexao, $query);
    $dados     = mysqli_num_rows($resultado);

    return $dados;
}

function removeCliente($codigo) {
    $conexao = conecta_bd();
    
      // Primeiro, exclua as ordens associadas ao cliente
    $query_ordem     = "DELETE FROM ordem WHERE cod_cliente='$codigo'";
    $resultado_ordem = mysqli_query($conexao, $query_ordem);
    
      // Em seguida, exclua o cliente
    $query_cliente     = "DELETE FROM cliente WHERE cod='$codigo'";
    $resultado_cliente = mysqli_query($conexao, $query_cliente);
    
    if ($resultado_cliente && $resultado_ordem) {
        return true; // Indica sucesso na remoção
    } else {
        return false; // Indica falha na remoção
    }
}

function buscaClienteeditar($codigo) {
    $conexao = conecta_bd();
    $query   = "select * from cliente where cod ='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados     = mysqli_fetch_array($resultado);

    return $dados;
}
function editarCliente($codigo,$status,$data){
    $conexao = conecta_bd();
    $query   = "select *
              from cliente
              where cod='$codigo'";

    $resultado = mysqli_query($conexao,$query);
    $dados     = mysqli_num_rows($resultado);
    if($dados == 1){
        $query = "update cliente
        set   status = '$status', data = '$data'
        where cod    = '$codigo'";
        $resultado = mysqli_query($conexao,$query);
        $dados     = mysqli_affected_rows($conexao);
        return $dados;
    }

}
?>
