<?php

require_once "models/UserModel.php";
class HomeController{
    public function homeAction(){
        $o_user = new User();
        if($o_user->isloged()){
            $o_view = new View('views/home.xsl');
            $o_view->showContents();
        }else{
            header("Location: ".URL."/login");
        }
    }
}