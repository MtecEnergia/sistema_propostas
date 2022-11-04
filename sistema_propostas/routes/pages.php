<?php

use \App\Http\Response;
use \App\Controller\Pages;

//ROTA HOME
$obRouter->get('/', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);

//ROTA SOBRE
$obRouter->get('/clients', [
    function($request){
        return new Response(200, Pages\ClientController::getClients($request));
    }
]);

//ROTA DASHBOARD
$obRouter->get('/dashboard', [
    function(){
        return new Response(200, Pages\Dashboard::getDashboard());
    }
]);

//ROTA DASHBOARD(INSERT)
$obRouter->post('/dashboard', [
    function($request){
        return new Response(200, Pages\Dashboard::insertClient($request));
    }
]);

//ROTA PROPOSTAS
$obRouter->get('/proposal', [
    function(){
        return new Response(200, Pages\ProposalController::getHome());
    }
]);

//ROTA FATURA
$obRouter->get('/fatura', [
    function(){
        return new Response(200, Pages\faturaController::getFatura());
    }
]);