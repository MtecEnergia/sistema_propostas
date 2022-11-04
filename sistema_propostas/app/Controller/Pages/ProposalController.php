<?php

namespace App\Controller\Pages;

use \App\utils\View;
use \App\Model\Entity\Organization;

class ProposalController extends Page 
{
    /**
     * Método responsável por retornar o conteúdo (view) da home
     * @return string
     */
    public static function getHome()
    {
        //Organização
        $obOrganization = new Organization;

        //VIEW DA HOME
        $content = View::render('pages/proposal', [
        'name' => $obOrganization->name,
        ]);  
        
        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Mtec Energia - Propostas', $content);
    }
}