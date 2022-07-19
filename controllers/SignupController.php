<?php
require_once "models/UserModel.php";
class SignupController{
    public function homeAction(){
        $o_view = new View('views/signup.xsl');
        $o_view->showContents();
    }
    
    public function signupAction(){
        $user = new User();
        if($user->signup()){
           $o_view = new View();
           $o_view->setParams($user);
           $o_view->showXML(); 
           header("Location: ".URL."/home");
        }else{

        }
    }
    public function signupXMLAction(){
        $user = new User();
        if($user->signup()){
           $o_view = new View();
           $o_view->setParams($user);
           $o_view->showXML(); 
        //    header("Location: ".URL."/home");
        }else{

        }
    }
}