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
            if($user->is_teacher()){
                header("Location: ".URL."/prof_agenda");
            }else{
                header("Location: ".URL."/home");
            }
        }else{
            // echo "sdasdasdaaaaaaaaaaaa";
            header("Location: ".URL."/login");

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

?>