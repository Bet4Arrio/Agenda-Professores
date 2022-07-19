<?php

require_once "models/UserModel.php";
require_once "models/AgendaModel.php";
class HomeController{
    public function homeAction(){
        $o_user = new User();
        if($o_user->isloged()){
            $o_agenda = new AgendaModel();

            $o_view = new View('views/agenda/todas.xsl');
            echo "testeeeeeeeeeeeeee";
            // $o_view->showContents();
        }else{
            header("Location: ".URL."/login");
        }
    }
}