<?php
include('./essencials/protect.php');

protect(1);

if (!class_exists('Conexao')) {
    include('./essencials/connection.php');
}

try {
    $conexao = new Conexao();
    $stmt = $conexao->conn->prepare("SELECT * FROM `comments`");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    exit("Erro na conexão: " . $e->getMessage());
}
?>

<div class="card_g">
    <div class="align-items-end">
        <div class="title_">
            <h2>gerenciar comentarios</h2>
        </div>
    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>nome</th>
                                <th>data de cadastro</th>
                                <th>conteudo</th>
                                <th>gerenciar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
        foreach ($result as $row) {
    ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo substr($row['data_cad'], 0, 10); ?></td>
            <td><?php echo substr($row['conteudo'], 0, 18);?></td>
            <td>
                <div class="row"> 
                    <a href="excluir_coment&id=<?php echo $row['id']; ?>">
                        <p> excluir</p>
                    </a>
                </div>
            </td>
        </tr>
    <?php
        }
    ?>
                        </tbody>
                        
                    </table>
    </div>
</div>