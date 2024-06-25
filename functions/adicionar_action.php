<?php
require "../config.php";

$descricao = filter_input(INPUT_POST, 'tarefas');
if ($descricao) {
    $insert = $pdo->prepare("INSERT INTO `todolist`.`tarefas` (`descricao`) VALUES (:descricao)");
    $insert->bindValue(':descricao', $descricao);
    $insert->execute();
    
    exit;
} else {
    echo "Erro";
    exit;
}
?>