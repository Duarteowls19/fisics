<?php

require_once './essencials/funcs.php'; 

$erro = array();

if (isset($_POST['enviar'])) {
    $nome = addslashes($_POST['nome']);
    $senha = addslashes($_POST['senha']);
    $repita_senha = addslashes($_POST['repita_senha']);
    $data_cadastro = date("Y-m-d H:i:s");

    if (empty($nome))
        $erro[] = "Preencha o nome";

    if (empty($senha))
        $erro[] = "Preencha a senha";

    if ($repita_senha != $senha) 
        $erro[] = "as senhas nao batem !";


    if (count($erro) == 0) {

        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $publicfunc = new publicFunctions();
        $publicfunc->inserirUser($nome,$senha,$data_cadastro,0);

        header("Location: index.php");
        exit();
    
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/logxx.css">
    <title>Document</title>
</head>
<body>

<section>
    <form action="" method="POST">
        <h2>Formulario de Cadastro</h2>
        <input type="text" name="nome" class="form-control" placeholder="nome">
        <br><br>
        <input type="password" name="senha" class="form-control" placeholder="senha">
        <br><br>
        <input type="password" name="repita_senha" class="form-control" placeholder="repita a senha">
        <br><br>
        <input type="submit" name="enviar" value="cadastrar">
        
    </form>

    </section>
       
</div>
</body>
</html>