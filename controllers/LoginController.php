<?php
require_once "models/UserModel.php";
class LoginController{
    public function homeAction(){
        $o_view = new View('views/login.xsl');
        $o_view->showContents();
    }
    public function loginAction(){
        $user = new User();
        if($user->login()){
           $o_view = new View();
           $o_view->setParams($user);
           $o_view->showContents(); 
           header("Location: ".URL."/home");
        }else{

        }
    }
    public function loginXMLAction(){
        $user = new User();
        if($user->login()){
           $o_view = new View();
           $o_view->setParams($user);
           $o_view->showXML(); 
        //    header("Location: ".URL."/home");
        }else{

        }
    }
}