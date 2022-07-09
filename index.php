<?php
define("URL", "/Agenda-Professores");

// $xmlUri      = 'my.xml';
// $xslUri      = 'views/login.xsl';
// $xmlDocument = new DOMDocument;
// $xslDocument = new DOMDocument;

// if ($xmlDocument->load($xmlUri) && $xslDocument->load($xslUri)) {

//     $xsltProc = new XSLTProcessor();

//     // $xsltProc->importStyleSheet($xslDocument);
//     $xsltProc->setParameter('', 'pi',"<foo><bar>oi</bar><bar>tudo</bar></foo>");
//     // $xsltProc->setParameter('', 'pi',"'t WORK!!!!!!!!!!!!!!!!!!!");
//     if ($xsltProc->importStyleSheet($xslDocument)) {
//         echo trim($xsltProc->transformToXML($xmlDocument));

//         // echo $xsltProc->transformToXML($xmlDocument);
//     }
// }


if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
  
ini_set('display_errors', 1);

//configurando o PHP para reportar todo e qualquer erro
error_reporting(E_ALL);


// Include router class
include('lib/routeCollection.php');
// echo hash('sha512',"221713");
Route::run('/');