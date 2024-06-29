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
       <form id="newTask" action="./functions/adicionar_action.php" method="POST">
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
                                          if($tarefa["status"]==1){
                                                 echo "Concluída";
                                          }else{
                                                 echo "Pendente";
                                          }; 
                                   ?>
                           
                     </td>
                     <td>
                            <a href="./Pages/updateStatus.php?id=<?=$tarefa['id'];?>">Update Status</a>
                            <a href="./Pages/editar.php?id=<?=$tarefa['id'];?>">Editar</a>
                            <a href="./functions/excluir_action.php?id=<?=$tarefa['id'];?>" onclick="return confirm('Você tem certeza que deseja exxluir esta tarefa?')">Excluir</a>
                     </td>
              </tr>
              <?php
              endforeach;
              ?>
              
       </table>
       </div>
       <script src="./scripts/main.js"></script>
</body>
</html>