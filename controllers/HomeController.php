<?php

class HomeController{
    public function homeAction(){
        $o_view = new View('views/login.xsl');
        $o_view->showContents();
    }
}