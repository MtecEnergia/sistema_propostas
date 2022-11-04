<?php

namespace App\Controller\Pages;

use \App\utils\View;
use \App\Model\Entity\Organization;
use \App\Model\Entity\ClientModel;

class Dashboard extends Page 
{
    /**
     * Método responsável por retornar o conteúdo (view) da home
     * @return string
     */
    public static function getDashboard()
    {
        //Organização
        $obOrganization = new Organization;

        //VIEW DA HOME
        $content = View::render('pages/dashboard', [
        'name' => $obOrganization->name
        ]);  
        
        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Mtec Energia - Dashboard', $content);
    }

    /**
     * Método responsável por cadastrar clientes
     * @param Request $request
     * @return string
     */
    public static function insertClient($request)
    {
        //DADOS DO POST
        $postVars = $request->getPostVars();
        
        //NOVA INSTANCIA DE CLIENTE (FAZER UMA VALIDAÇÃO)
        $obClient = new ClientModel;
        $obClient->nameClient = $postVars['nome'];
        $obClient->cpfClient = $postVars['cpf'];
        $obClient->adressClient = $postVars['endereco'];
        $obClient->cepClient = $postVars['cep'];
        $obClient->cadastrar();

        //
        return self::getDashboard($request);
    }
}