<?php

require_once("lib/PersistModelAbstract.php");

class User extends PersistModelAbstract{
    protected $matricula;
    protected $nome;
    protected $status;
    function __construct(){
        parent::__construct();
    }
    /**
     *  Realiza Login
     * @param string $matricula 
     * @param string $nome 
     * @param string $senha
     * @return Boolean
    */
    public function Signup(){
        return FALSE
    }

    /**
     *  Realiza Login
     * @param string $matricula 
     * @param string $senha
     * @return Boolean
    */
    public function Login($matricula, $senha){
        return FALSE
    }

    /**
     * REaliza logout
     * @return Boolean
     */
    public function Logout(){
        return FALSE
    }

    private function createTable(){
        $query ="CREATE TABLE IF NOT EXISTS User 
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