<?php

try {
    
    include_once('../essencials/funcs.php');
        include_once('../essencials/connection.php');

        session_start();

        

    if (isset($_POST['result'])) {

        $id_usuario = $_SESSION['user'];
        

        $conexao = new Conexao();
        $stmt = $conexao->conn->prepare("SELECT * FROM `users` WHERE id = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $nome = $user['nome'];
        $data_cadastro = date("Y-m-d H:i:s");

        $result = $_POST['result'];

        $stmt = $conexao->conn->prepare("INSERT INTO results (id, nome, result, data_cad) VALUES (null, :nome, :result, :data_cad)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':result', $result);
        $stmt->bindParam(':data_cad', $data_cadastro);
        $stmt->execute();

        $response = [
            'success' => true,
            'message' => 'Dados do formulário recebidos e salvos com sucesso.'
        ];
        echo json_encode($response);
    } else {
        // Se o campo 'result' não foi enviado, você pode retornar uma resposta de erro em JSON
        $response = [
            'success' => false,
            'message' => 'Campo "result" não foi enviado.'
        ];
        echo json_encode($response);
    }
} catch(PDOException $e) {
    // Em caso de erro na conexão ou na execução da consulta, retorna uma resposta de erro em JSON
    $response = [
        'success' => false,
        'message' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()
    ];
    echo json_encode($response);
}
?>