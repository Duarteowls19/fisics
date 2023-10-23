<?php
require_once('connection.php');


class PublicFunctions extends Conexao{
    public function logar($email, $senha){
        $cadastrados = $this->conn->prepare("SELECT * FROM `users` WHERE nome = ?");
        $cadastrados->execute([$email]);
        $user = $cadastrados->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($senha, $user['senha'])) {
            session_start();
            $_SESSION['user'] = $user['id'];
            $_SESSION['admin'] = $user['admin'];
            header("Location: index.php");
            exit();
        } else {
            return 'Login inválido';
        }
    }

    public function inserirUser($nome, $senha, $data_cad, $admin){

        $erro = array();
  
        $cadastrados = $this->conn->prepare("SELECT id FROM `users` WHERE nome = :nome");
        $cadastrados->bindParam(':nome', $nome);
        $cadastrados->execute();
        if ($cadastrados->rowCount() > 0) {
            $erro[] = "O nome de usuário já está em uso. Escolha outro nome.";
            return $erro; // Retorna o array $erro em caso de erro
        }
        
        $sql = "INSERT INTO users (nome, senha, data_cad, admin) VALUES (:nome, :senha, :data_cad, :admin)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':data_cad', $data_cad);
        $stmt->bindParam(':admin', $admin);
        $stmt->execute();
       
    }

    public function comment($nome, $conteudo, $data_cad){

        $sql = "INSERT INTO comments (nome, data_cad, conteudo) VALUES (:nome, :data_cad, :conteudo)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_cad', $data_cad);
        $stmt->bindParam(':conteudo', $conteudo);
        $stmt->execute();
    }
    public function excluirNoticia($id){
        $sql = "DELETE FROM noticias WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    

    public function mostrarNoticiasCompletas($id){
        // ORDER BY `data_pub` DESC
        $noticias = $this->conn->query("SELECT * FROM `noticias` WHERE id = $id");
        $noticia = $noticias->fetchAll();
        arsort($noticia);
        return $noticia;
    }
    public function mostrarNoticiasIncompletas(){
        $noticias = $this->conn->query("SELECT * FROM noticias");
        $noticia = $noticias->fetchAll();
        arsort($noticia);
        return $noticia;
    }
    public function inserir_quiz_request($nome,$mensagem,$resultado){
        $sql = "INSERT INTO quiz request (nome, mensagem, resultado)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':mensagem', $mensagem);
        $stmt->bindParam(':resultado', $resultado);
        
        $stmt->execute();
        
        if($stmt->rowCount() >= 1){
            echo json_encode('salvo com sucesso');
        }else{
            echo json_encode('deu merda');
        }
    }
}
?>