<?php
require "../config.php";    

$descricao = filter_input(INPUT_POST, 'tarefas');
if ($descricao) {
    $insert = $pdo->prepare("INSERT INTO `todolist`.`tarefas` (`descricao`) VALUES (:descricao)");
    $insert->bindValue(':descricao', $descricao);
    $insert->execute();
    header("Location: ../index.php");
    exit;
} else {
    header("Location: ../index.php");
    exit;
}
?>