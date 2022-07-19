<?php

include('lib/Route.php');
// Add base route (startpage)
Route::add('/', ["HomeController", "home"]);
Route::add('/home', ["HomeController", "home"]);
Route::add('/agenda', ["AgendaController", "home"]);
Route::add('/agenda/[0-9]*', ["AgendaController", "prof"]);

Route::add('/signup', ["SignupController", "home"]);
Route::add('/signup', ["SignupController", "signup"], "post");

Route::add("/Agenda-O-Satanas-Esta-Em-Meu-Ser-Eu-Quero-Abusar-Sexualmente-De-Alguem-Inferno-Diabo-Eu-Te-Ofereco-A-Minha-Alma", ["AgendaController", "MyAgenda"]);
Route::add('/login', ["LoginController", "home"]);
Route::add('/login', ["LoginController", "login"], "post");
Route::add('/logout', ["LogoutController", "home"]);



// XML PART

Route::add('/xml/signup', ["SignupController", "signupXML"], "post");
Route::add('/xml/login', ["LoginController", "loginXML"], "post");
// Route::add('/Cursos/interessado',["CursoController","Interessado"], "post");
// Route::add('/Cursos/(.*)',["CursoController","Curso"]);
