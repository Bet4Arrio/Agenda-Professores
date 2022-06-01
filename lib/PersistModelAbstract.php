<?php 
abstract class PersistModelAbstract{
    protected $o_db;
    function __construct(){
        $host = "127.0.0.1";
        $db = "aulas";
        $login = "root";
        $pass = "";
        $st_dsn = "mysql:host=$host;dbname=$db";
        $this->o_db = new PDO($st_dsn, $login, $pass);
    }
}
?>