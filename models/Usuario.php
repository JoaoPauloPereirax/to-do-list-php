<?php
class Usuario {
       private $id;
       private $descricao;
       private $status;

       public function getId(){
              return $this->id;
       }
       public function setId($i){
              $this->id=trim($i);//trim tira os espaços
       }

       public function getDesc(){
              return $this->descricao;
       }

       public function setDesc($d){
              $this->descricao= ucfirst(trim($d));
              //ucfirst() deixa somente a primeira letra maiúscula
              //ucwords() faz todas as palavras começarem com letra maiúscula
       }

       public function getStatus(){
              return $this->status;
       }

       public function setStatus($s){
              $this->status = $s;
       }
}

interface UsuarioDAO{
       public function add(Usuario $u);
       public function findAll();
       public function findById($id);
       public function update(Usuario $u);
       public function delete($id);

}