<?php

include('lib/Route.php');
// Add base route (startpage)
Route::add('/', ["HomeController", "home"]);
Route::add('/home', ["HomeController", "home"]);
Route::add('/agenda', ["AgendaController", "home"]);

Route::add('/signup', ["SignupController", "home"]);
Route::add('/signup', ["SignupController", "signup"], "post");


Route::add('/login', ["LoginController", "home"]);
Route::add('/login', ["LoginController", "login"], "post");



// XML PART

Route::add('/xml/signup', ["SignupController", "signupXML"], "post");
Route::add('/xml/login', ["LoginController", "loginXML"], "post");
// Route::add('/Cursos/interessado',["CursoController","Interessado"], "post");
// Route::add('/Cursos/(.*)',["CursoController","Curso"]);
