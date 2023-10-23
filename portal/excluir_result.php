<?php
include('./essencials/protect.php');
protect(1);

$id = intval($_GET['id']);

echo $id;
if (!class_exists('Conexao')) {
    include('./essencials/connection.php');
}


try {
    $conexao = new Conexao();
    $stmt = $conexao->conn->prepare("DELETE FROM results WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    //$user = $stmt->fetch(PDO::FETCH_ASSOC);
    die("<script>location.href=\"results_adm\";</script>");

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>