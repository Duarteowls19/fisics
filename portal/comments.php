<?php


// Verificar se a variável de sessão 'user' existe e não está vazia
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    echo "Usuário não logado";
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/logxx.css">
    <title>comentar</title>
</head>
<body>
    <section>
        <form action="" method="POST">
            <h2>comentar</h2>
            <textarea name="comment" id="" cols="30" rows="10" placeholder="comente / limite de 450 caracteres"></textarea>
           
            <input type="submit" name="sub" value="enviar">
        </form>
    </section>

    <?php
    if (isset($_POST['sub'])) {
        include_once('./essencials/funcs.php');
        include_once('./essencials/connection.php');


        $id_usuario = $_SESSION['user'];
        
        $conexao = new Conexao();
        $stmt = $conexao->conn->prepare("SELECT * FROM `users` WHERE id = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $nome = $user['nome'];
        $conteudo = addslashes($_POST['comment']);
        $data_cadastro = date("Y-m-d H:i:s");

        $publicfunc = new PublicFunctions();
        $publicfunc->comment($nome, $conteudo, $data_cadastro);

        header("Location: index.php");
        exit();  
    }
    ?>

</body>
</html>

<?php
}
?>