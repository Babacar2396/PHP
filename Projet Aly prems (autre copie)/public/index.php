<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

require('../vendor/autoload.php');

use Routers\Routeur;

$router = new Routeur();


$router->get('/', 'ConnexionControlleur@connect');

$router->get('/niveau', 'NiveauControlleur@lister');
$router->post('/niveau', 'NiveauControlleur@lister');

$router->get('/niveau/classes/:id', 'NiveauControlleur@chargerClasses');

$router->get('/classes/liste/:id', 'ClasseControlleur@chargerEleves');

$router->get('/classes/coef/:id', 'CoefControlleur@updateCoef');

$router->post('/delete/disc', 'CoefControlleur@delete');

$router->post('/update/disc', 'CoefControlleur@update');

//$router->get('/update/disc', 'CoefControlleur@update');


$router->get('/annee', 'AnneeControlleur@lister');
$router->post('/addannee', 'AnneeControlleur@inserer');
$router->post('/newyear', 'AnneeControlleur@modifier');
$router->post('/delete', 'AnneeControlleur@supprimer');
$router->post('/active', 'AnneeControlleur@activer');
$router->post('/desactive', 'AnneeControlleur@desactiver');

$router->post('/addniveau', 'NiveauControlleur@inserer');

$router->post('/addclasse', 'ClasseControlleur@inserer');

$router->get('/addeleve', 'AddEleveControlleur@display');

$router->get('/listeEleves', 'EleveControlleur@lister');

$router->get('/student/:id', 'AddEleveControlleur@el');

$router->post('/newEleve', 'EleveControlleur@inserer');


$router->get('/discipline/gestion', 'DisciplineControlleur@gestion');
$router->post('/discipline/gestion', 'DisciplineControlleur@gestion');

$router->get('/niveaux/classes/:id', 'DisciplineControlleur@listerClasses');
$router->post('/niveaux/classes/:id', 'DisciplineControlleur@listerClasses');

$router->get('/classe/disciplines/:id', 'DisciplineControlleur@listerDisciplines');
$router->post('/classe/disciplines/:id', 'DisciplineControlleur@listerDisciplines');









$router->run();

