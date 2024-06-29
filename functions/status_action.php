<?php
require "../config.php";
$id = filter_input(INPUT_POST, 'id');
$status = filter_input(INPUT_POST, 'status');
if (isset($status) && $id) {
    if($status==1){
        $status = 0;
        $sql = $pdo->prepare('UPDATE todolist.tarefas SET status = (:status) WHERE id = (:id)');
        $sql->bindValue(":status",$status);
        $sql->bindValue(":id",$id);
        $sql->execute();
        header("Location: ../index.php");
        exit;
    }else{
        $status = 1;
        $sql = $pdo->prepare('UPDATE todolist.tarefas SET status = (:status) WHERE id = (:id)');
        $sql->bindValue(":status",$status);
        $sql->bindValue(":id",$id);
        $sql->execute();
        header("Location: ../index.php");
        exit;
    }
} else {
       header("Location: ../index.php");
       exit;
}
?>