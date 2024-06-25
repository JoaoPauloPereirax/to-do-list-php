<?php
require('./config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>To-Do List</title>
       <link rel="stylesheet" href="./assets/styled.css">
</head>
<body>
       <div class="container">
              <!-- ADICIONAR -->
       <form action="./functions/adicionar_action.php" method="POST">
              Nova Tarefa: <input type="text" name="tarefas" >
              <input type="submit" value="Incluir">
       </form>

       <!-- ACESSANDO OS DADOS -->
       <?php
       $sql = $pdo->query("SELECT * FROM `todolist`.`tarefas`;");
      
       if($sql->rowCount()>0){
              $dados = $sql->fetchAll(PDO::FETCH_ASSOC);       
       }
       
      
       
       ?>
       <table border="1" width="100%">
              <tr>
                     <th>ID</th>
                     <th>DESCRIÇÃO</th>
                     <th>STATUS</th>
                     <th>AÇÕES</th>
              </tr>
              <?php
              foreach($dados as $tarefa):?>
              <tr>
                     <td><?= $tarefa["id"]; ?></td>
                     <td><?= $tarefa["descricao"]; ?></td>
                     <td>
                            <?php
                                   if($tarefa["concluida"]==1){
                                          echo "Concluída";
                                   }else{
                                          echo "Pendente";
                                   }; 
                            ?>
                     </td>
                     <td>
                            <a href="editar_action.php?id=<?=$usuario['id'];?>">Editar</a>
                            <a href="excluir_action.php?id=<?=$usuario['id'];?>">Excluir</a>
                     </td>
              </tr>
              <?php
              endforeach;
              ?>
              
       </table>
       </div>
</body>
</html>