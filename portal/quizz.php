<?php
include('./essencials/protect.php');

if (!class_exists('Conexao')) {
    include('./essencials/connection.php');
}

try {
    $conexao = new Conexao();
    $stmt = $conexao->conn->prepare("SELECT * FROM results ");
    $stmt->execute();

    // Obtendo os resultados
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    exit("Erro na conexão: " . $e->getMessage());
}
try {
  $conexao = new Conexao();
  $stmt = $conexao->conn->prepare("SELECT SUM(exist) AS total FROM results");
  $stmt->execute();

  // Obtendo os resultados
  $resultx = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $total = $resultx[0]['total'];
} catch(PDOException $e) {
  exit("Erro na conexão: " . $e->getMessage());
}
try {
  $conexao = new Conexao();
  $stmt = $conexao->conn->prepare("SELECT SUM(result) AS total FROM results");
  $stmt->execute();

  // Obtendo os resultados
  $resultx2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $total2 = $resultx2[0]['total'];
} catch(PDOException $e) {
  exit("Erro na conexão: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style/qui.css">
</head>
<body>

  <h2>Quiz</h2>
  
  
    <div class="content">
      <span class="spnQtd"></span>
      <span class="question"></span>
      <div class="answers"></div>
    </div>
    <div class="finish">
      <span></span>
      <form id="quizForm" method="POST">
          <button id="btnRestart" type="button">Restart Quiz</button>
      </form>
      
    </div>
</main>
  <section>
    <div class="media">
    
    
      <p>media geral : <?php echo $total2/$total ?></p>
      <p>numero de usuarios : <?php echo $total ?></p>
      
    </div>
    <div class="comments_">
            <?php if (empty($result)) { ?>

            <div class="content_">
            <p>404.</p>
            </p>
       
     <?php } else {
        foreach ($result as $row) {
     ?>
     <div class="comments_forreal">
        
            <div class="info_r">
                <img src="./images/other/Design sem nome (4).png" alt="">
                <p><?php echo $row['nome'];  ?></p>
                <p>resultado :</p>
                <p><?php echo $row['result'];  ?></p>
                <p><?php echo substr($row['data_cad'], 0, 10);  ?></p>
            </div>

     </div>

     <?php
        }
     }
     ?>

        </div>
</section>
  <script src="./quiz/sh.js" type="module"></script>
</body>
</html>