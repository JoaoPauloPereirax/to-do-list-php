<?php
require "../config.php";
$id = filter_input(INPUT_POST, 'id');
$descricao = filter_input(INPUT_POST, 'tarefas');
if ($descricao && $id) {
    $sql = $pdo->prepare('UPDATE todolist.tarefas SET descricao = (:descricao) WHERE id = (:id)');
    $sql->bindValue(":descricao",$descricao);
    $sql->bindValue(":id",$id);
    $sql->execute();
    header("Location: ../index.php");
    exit;
} else {
       header("Location: ../index.php");
       exit;
}
?>