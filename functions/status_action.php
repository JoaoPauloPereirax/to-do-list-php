<?php
require "../config.php";

$id = filter_input(INPUT_POST, 'id');
$status = filter_input(INPUT_POST, 'status');

if ($id && $status) {
    if($status==1){
        $status = 0;
        $insert = $pdo->prepare("UPDATE `todolist`.`tarefas` SET `concluida`=`:status` WHERE  `id`=`:id`;");
        $insert->bindValue(':id', $id);
        $insert->bindValue(':status', $status);
        $insert->execute();
        header("Location: ../index.php");
        exit;
    }else{
        $status = 1;
        $insert = $pdo->prepare("UPDATE `todolist`.`tarefas` SET `concluida`=`:status` WHERE  `id`=`:id`;");
        $insert->bindValue(':id', $id);
        $insert->bindValue(':status', $status);
        $insert->execute();
        header("Location: ../index.php");
        exit; 
    }
} else {
    header("Location: ../index.php");
    exit;
}
?>