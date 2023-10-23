<?php
session_start();

if (isset($_SESSION['user'])) {
    include('./essencials/connection.php');

    $pagina = "inicial.php";

    if (isset($_GET['p'])) {
        $pagina = $_GET['p'] . ".php";
    }

    $id_usuario = $_SESSION['user'];
    $conexao = new Conexao();
    $conn = $conexao->conn;
    $cadastrados = $conn->prepare("SELECT * FROM `users` WHERE id = :id_usuario");
    $cadastrados->bindParam(':id_usuario', $id_usuario);
    $cadastrados->execute();
    $user = $cadastrados->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/thix.css">
    <link rel="icon" href="./images/other/Design sem nome (9).png" type="image/png">
    <title>backtime news portal</title>
</head>
<body>
 <header class="main_header">
    <div class="logo">
        <a href="<?php echo htmlspecialchars('/fisics/home'); ?>"><h1>alessandro volta</h1></a>
        <p>lorem ipsum</p>
    </div>


    <div class="links"> 
       <!--<a  href="<?php echo htmlspecialchars('/fisics/home'); ?>"><img src="./images/other/Design sem nome (3).png" alt=""></a>-->
       <div class="login-up"><a href="<?php echo htmlspecialchars('/fisics/login'); ?>"><img src="./images/other/Design sem nome (4).png" alt=""></a><p><?php if (isset($_SESSION['user'])) { echo $user['nome']; }else{ echo 'user'; }?></p></div>
       <!--<a href="<?php echo htmlspecialchars('/fisics/creditos'); ?>"><img src="./images/other/Design sem nome (5).png" alt=""></a>-->
       <?php if(!isset($_SESSION['admin']) || $_SESSION['admin'] == 0){ ?>
        <div class="login-up"><a href="<?php echo htmlspecialchars('/fisics/logout'); ?>"><img src="./images/other/Design sem nome (6).png" alt=""></a><p>logout</p></div>
        <div class="login-up"><a href="<?php echo htmlspecialchars('/fisics/quizz'); ?>"><img src="./images/other/Design sem nome (10).png" alt=""></a><p>quiz</p></div>
        <?php } else { ?>
            <div class="login-up"><a href="<?php echo htmlspecialchars('/fisics/logout'); ?>"><img src="./images/other/Design sem nome (6).png" alt=""></a><p>logout</p></div>
            <div class="login-up"><a href="<?php echo htmlspecialchars('/fisics/tools'); ?>"><img src="./images/other/Design sem nome (5).png" alt=""></a><p>tools</p></div>
            <?php } ?>
    </div>
        
</header>
<main>
    <?php 
        include_once('./essencials/routes.php');
        routesURL();
    ?>
</main>
</body>
</html>