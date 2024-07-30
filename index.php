<?php
require('./config.php');
require('./dao/UsuarioDaoMysql.php');
//acessando os dados
$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();

       
      
       
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>To-Do List</title>
       <link rel="stylesheet" href="./assets/_cdn/css/main.css">
</head>
<body>
       <div class="container">
              <!-- ADICIONAR -->
       <form id="newTask" action="./functions/adicionar_action.php" method="POST">
             VISITANTES: <input type="text" name="tarefas" >
              <input type="submit" value="Incluir">
       </form>
       <table border="1" width="100%">    
              <tr>
                     <th>DESCRIÇÃO</th>
                     <th>STATUS</th>
                     <th>AC</th>
              </tr>
              <?php
              foreach($lista as $tarefa):?>
              <tr>
                     <td><?= $tarefa->getDesc(); ?></td>
                     <td>
                            <a id="status" href="./Pages/updateStatus.php?id=<?=$tarefa->getId();?>">
                                   <?php
                                          $status_tarefa = $tarefa->getStatus();
                                          if($status_tarefa==0){
                                                 echo "Ausente";
                                          }else{
                                                 echo "Presente";
                                          }; 
                                   ?>
                            </a>
                     </td>
                     <td>
                            
                            <a class="actions" href="./Pages/editar.php?id=<?=$tarefa->getId();?>">
                                   <img src="./assets/images/pencil-square.svg" alt="Atualizar">
                            </a>
                            <a class="actions" href="./functions/excluir_action.php?id=<?=$tarefa->getId();?>" onclick="return confirm('Você tem certeza que deseja exxluir esta tarefa?')">
                                   <img src="./assets/images/delete.svg" alt="Delete">
                            </a>
                     </td>
              </tr>
              <?php
              endforeach;
              ?>
              
       </table>
       </div>
      
</body>
</html>