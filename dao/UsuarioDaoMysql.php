<?php

require_once 'models/Usuario.php';//esses arquivos serão puxados do index
 class UsuarioDaoMysql implements UsuarioDAO {
       private $pdo;
       public function __construct(PDO $driver)
       {
              $this->pdo = $driver;
       }
       public function add(Usuario $u){

       }
       public function findAll(){
              $array = [];
              $select_sql = "SELECT * FROM `todolist`.`tarefas`;";
              $sql = $this->pdo->query($select_sql);
              if($sql->rowCount()>0){
                     $data = $sql->fetchAll();
                     foreach($data as $item){
                            $u = new Usuario();
                            $u->setId($item['id']);
                            $u->setDesc($item['descricao']);
                            $u->setStatus($item['status']);
                            $array[] = $u;
                            
                     }
              }
              return $array;
       }
       public function findById($id){

       }
       public function update(Usuario $u){

       }
       public function delete($id){

       }

 }