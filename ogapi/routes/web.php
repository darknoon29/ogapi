<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use OGetIt;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/combatreport/{id}', function ($id) use ($router) {

    $uni = 140;
    $lang = fr;
    $apikey = '';

    $ogetit = new OGetIt($uni, $lang, $apikey);

//Get Combat report
    $cr = $ogetit->getCombatReport($id);
    return $cr;

});