<?php
require ("../config.php");
$info = [];
$id = filter_input(INPUT_GET,'id');
if($id){
       $sql = $pdo->prepare("SELECT * FROM todolist.tarefas WHERE id = :id;");
       $sql->bindValue(":id",$id);
       $sql->execute();
       if($sql->rowCount()>0){
              $info = $sql->fetch(PDO::FETCH_ASSOC);
       }else{
              header("Location: ../index.php");
              exit;
       }
}else{
       header("Location: ../index.php");
       exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Editar</title>
       <link rel="stylesheet" href="style.css">
</head>
<body>
       <h1>Você tem certeza disso?</h1>
       <form action="../functions/status_action.php" method="POST" >
              <input type="hidden" name="id" value="<?=$info['id'];?>">
              <input type="hidden" name="status" value="<?=$info['status'];?>">
              <?php
                     if($info['status']==1){
                            echo "Concluída >> Pendente";
                     }else{
                            echo "Pendente >> Concluída";
                     }
              ?>
              <input type="submit" value="Sim">
              
       </form>
</body>
</html>