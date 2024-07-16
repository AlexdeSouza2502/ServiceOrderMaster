  // bd_ordem.php

// Função para consultar o status do usuário
function consultaStatusUsuario($status) {
    // Simulando uma consulta ao banco de dados para obter o total de ordens de serviço com o status especificado
    // Aqui você colocaria sua lógica de consulta ao banco de dados
    // Por enquanto, vamos apenas retornar um valor fictício
    switch ($status) {
        case 1:
            return array('total' => 10); // Total de ordens de serviço abertas
        case 2:
            return array('total' => 5); // Total de ordens de serviço em execução
        case 3:
            return array('total' => 20); // Total de ordens de serviço concluídas
        default:
            return array('total' => 0); // Status inválido
    }
}
