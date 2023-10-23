<?php

if(isset($_POST['email'])){
    try {
        require_once './essencials/funcs.php'; 

        $email = $_POST['email'];
        $senha = $_POST['password'];
        $publicfuncs = new PublicFunctions();
        $publicfuncs->logar($email,$senha);
        
    } catch(PDOException $e) {
        echo "<h1 style=color:white>Erro ao conectar ao banco de dados: </h1>" . $e->getMessage();
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
    <title>Login</title>
</head>
<body>
    <section>
    <form action="" method="POST">
        <h2>Login</h2>
        <input type="text" id="email" name="email" placeholder="nome" required>
        <br><br>
        <input type="password" id="password" name="password" placeholder="senha" required>
        <br><br>
        <input type="submit" name="sub" value="Log In">
        <a href="<?php echo htmlspecialchars('/fisics/adduser'); ?>"><p>ainda nao tem login ?</p></a>
        
    </form>

    </section>
</body>
</html>

