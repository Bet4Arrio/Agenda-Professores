<?php

include('lib/Route.php');
// Add base route (startpage)
Route::add('/', ["HomeController", "home"]);
Route::add('/home', ["HomeController", "home"]);
Route::add('/agenda', ["AgendaController", "home"]);
// Route::add('/Cursos/interessado',["CursoController","Interessado"], "post");
// Route::add('/Cursos/(.*)',["CursoController","Curso"]);
