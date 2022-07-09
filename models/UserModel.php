<?php

require_once("lib/PersistModelAbstract.php");

class User extends PersistModelAbstract{
    public $Id;
    public $matricula;
    public $nome;
    public $cargo_choices = [
        0 => "Aluno",
        1=> "Professor",
    ];
    private $cargo = 0;
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
    public function setCargo($_cargo){
        $this->cargo = $_cargo;
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
                        senha,
                        cargo
                    )
                    VALUES
                    (   
                        '$this->matricula',
                        '$this->nome',
                        '$this->senha'
                        '$this->cargo'
                    );";
        }else{
            "UPDATE `User` SET
                matricula=  $this->matricula,
                nome = $this->nome,
                cargo = $this->cargo,
                senha= hash('sha512', $this->senha),
            WHERE
                Id=$this->Id;";
        }

        try {
            if($this->o_db->exec($query)>0){
                if(is_null($this->Id)){
                    return $this->o_db->lastInsertId();
                }else{
                    return $this->Id;
                }
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return false;
    }

    public function is_teacher(){
        return $this->cargo;
    }

    public function Signup(){
        $this->setMatricula($_REQUEST['matricula']);
        $this->setSenha($_REQUEST['senha']);
        $this->setNome($_REQUEST['nome']);
        if(isset($_REQUEST['cargo']) && !empty($_REQUEST['cargo'])){
            $this->setCargo($_REQUEST['cargo']);
        }
        $this->save();
    }
    public function loadByMatricula($matricula){
        $query = "SELECT * FROM `User` WHERE matricula = '$matricula'";
        $ret = $this->o_db->query($query);
        if($ret != false){
            $data = $ret->fetchObject();
            $this->setId($data->Id);
            $this->setNome($data->name);
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
            `cargo` INT DEFAULT 0,
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