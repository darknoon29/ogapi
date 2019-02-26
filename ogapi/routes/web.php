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

use OGetIt\OGetIt;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/bonjour/{name}', function ($name) use ($router) {
    return "Bonjour " . $name;
});


$router->get('/combatreport/{id}', function ($id) {

    list($type, $lang,$uni,$id) = preg_split("/\-/", $id);

    if( $type === 'cr'){
        $apikey = env('OGAME_API_KEY', 'xxxxxxxxx');
        $ogetit = new OGetIt($uni, $lang, $apikey);

        //Get Combat report
        $cr = $ogetit->getCombatReport($id);

        return response()->json($cr);
    }
    else {
        return response(500);
    }
});

//spy report : sr-en-801-0ab96da7462cf2f9ab485841f9cef6bf909173b0

$router->get('/spyreport/{id}', function ($id) {

    list($type, $lang,$uni,$id) = preg_split("/\-/", $id);

    if( $type === 'sr'){
    $apikey = env('OGAME_API_KEY', 'xxxxxxxxx');
    $ogetit = new OGetIt($uni, $lang, $apikey);

    //Get Combat report
    $cr = $ogetit->getSpyReport($id);

    return response()->json($cr);
    }
    else {
        return response(500);
    }
});


$router->get('/harvestreport/{id}', function ($id) {

    list($type, $lang,$uni,$id) = preg_split("/\-/", $id);

    if( $type === 'rr'){
        $apikey = env('OGAME_API_KEY', 'xxxxxxxxx');
        $ogetit = new OGetIt($uni, $lang, $apikey);

        //Get Combat report
        $cr = $ogetit->getHarvestReport($id);

        return response()->json($cr);
    }
    else {
        return response(500);
    }
});


$router->get('/mipreport/{id}', function ($id) {

    list($type, $lang,$uni,$id) = preg_split("/\-/", $id);

    if( $type === 'mr'){
        $apikey = env('OGAME_API_KEY', 'xxxxxxxxx');
        $ogetit = new OGetIt($uni, $lang, $apikey);

        //Get Combat report
        $cr = $ogetit->getMissileReport($id);

        return response()->json($cr);
    }
    else {
        return response(500);
    }
});