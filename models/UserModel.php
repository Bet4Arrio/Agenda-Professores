<?php

require_once("lib/PersistModelAbstract.php");

class User extends PersistModelAbstract{
    public $Id;
    public $matricula;
    public $nome;
    protected $senha;
    function construct(){
        parent::construct();
        $this->createTable();
    }
    /**
     *  Realiza Login
     * @param string $matricula 
     * @param string $nome 
     * @param string $senha
     * @return Boolean
    */
   

    public function setId($_Id){
        $this->Id = $_Id;
    }
    public function setMatricula($_matricula){
        $this->matricula = $_matricula;
    }
    public function setNome($_nome){
        $this->nome = $_nome;
    }
    public function setSenha($_senha){
        $this->senha =hash('sha512', $_senha ) ;
    }


    public function save(){
        if(is_null($this->Id)){
            $query = "INSERT INTO `User` 
                    (
                        matricula,
                        nome,
                        senha
                    )
                    VALUES
                    (   
                        '$this->matricula',
                        '$this->nome',
                        '$this->senha'
                    );";
        }else{

            "INSERT INTO `User` 
                matricula=  $this->matricula,
                nome = $this->nome,
                senha= hash('sha512', $this->senha),
            WHERE
                Id=$this->Id;";
        }

        try {
            if($this->o_db->exec($query)>0){
                if(is_null($this->id)){
                    return $this->o_db->lastInsertId();
                }else{
                    return $this->id;
                }
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return false;
    }
    public function Signup(){
        $this->setMatricula($_REQUEST['matricula']);
        $this->setSenha($_REQUEST['senha']);
        $this->setNome($_REQUEST['nome']);

        $this->save();
    }
    public function loadByMatricula($matricula){
        $query = "SELECT * FROM `User` WHERE matricula = '$matricula'";
        $ret = $this->o_db->query($query);
        if($ret != false){
            $data = $ret->fetchObject();
            $this->setId($data->Id);
            $this->setName($data->name);
            $this->setMatricula($data->matricula);
            $this->setSenha($data->senha);
            return $this;
        }
        return false;
    }

    public function login(){

        $log = addslashes($_REQUEST["matricula"]);
         if($this->loadByMatricula($log) != false){
             if(hash('sha512',$_REQUEST["senha"]) == $this->getPass()){
                 $_SESSION["login"] = true;
                 $_SESSION["user"] = $this;
                return $this;
             }else{
                 return false;
             }
         }else{
             return false;
         }
     }
 
     public function isloged(){
         if(isset($_SESSION["login"]) && $_SESSION["login"] == true){
             $this->setAdmin($_SESSION["adm"]);
             return $this;
         }
         return false;
     }

     public function logout(){
         session_destroy();
         return true;
     }


    private function createTable(){
        $query ="CREATE TABLE IF NOT EXISTS `User` 
        (
            Id INTEGER NOT NULL AUTO_INCREMENT,
            `matricula` CHAR(255) NOT NULL,
            `senha` CHAR(255) NOT NULL,
            `nome` CHAR(255) NOT NULL,
            PRIMARY KEY(Id)
        );
        ";
        $st = $this->o_db->prepare($query);
         try{
            $st->execute();

          }
          catch(PDOException $e)
          {
              throw $e;
          }   
    }
}