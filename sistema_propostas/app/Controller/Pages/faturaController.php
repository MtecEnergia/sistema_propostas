<?php

namespace App\Controller\Pages;

use \App\utils\View;
use \App\Model\Entity\Organization;

class faturaController extends Page 
{
    /**
     * Método responsável por retornar o conteúdo (view) da home
     * @return string
     */
    public static function getFatura()
    {
        //Organização
        $obOrganization = new Organization;

        //VIEW DA HOME
        $content = View::render('pages/fatura', [
        'name' => $obOrganization->name,
        ]);  
        
        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Mtec Energia - Home', $content);
    }
}