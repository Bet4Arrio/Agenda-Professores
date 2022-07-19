<?php

require_once "models/UserModel.php";
require_once "models/AgendaModel.php";
class LogoutController{
    public function homeAction(){
        $o_user = new User();
        if($o_user->isloged()){
            $o_user->logout();
        }
        header("Location: ".URL."/login");
    }
}