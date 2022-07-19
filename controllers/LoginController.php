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
                header("Location: ".URL."/Agenda-O-Satanas-Esta-Em-Meu-Ser-Eu-Quero-Abusar-Sexualmente-De-Alguem-Inferno-Diabo-Eu-Te-Ofereco-A-Minha-Alma");
            }else{
                header("Location: ".URL."/home");
            }
        }else{
            header("Location: ".URL."/login");
        }
    }
    public function loginXMLAction(){
        $user = new User();
        if($user->login()){
           $o_view = new View();
           $o_view->setParams($user);
           $o_view->showXML(); 
        }else{

        }
    }
}

?>