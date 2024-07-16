<?php 
	require_once("valida_session.php");
	require_once ("bd/bd_servico.php");

	$codigo = $_GET['cod'];

	if ($_SESSION['cod_usu'] != $codigo){
	$dados = removeServico($codigo);

	if($dados == 0){
		$_SESSION['texto_erro'] = 'Os dados do serviço não foram excluidos do sistema!';
		header ("Location:servico.php");
	}else{
		$_SESSION['texto_sucesso'] = 'Os dados do serviço foram excluidos do sistema.';
		header ("Location:servico.php");
	}
    }else{
	$_SESSION['texto_erro'] = 'O Serviço não pode ser excluído do sistema, pois está logado!'; 
	header ("Location:usuario.php");
}

?>