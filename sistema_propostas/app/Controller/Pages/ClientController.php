<?php

namespace App\Controller\Pages;

use \App\Model\Entity\ClientModel;
use \App\utils\View;
use \App\Model\Entity\Organization;
use \Database\Pagination;

class ClientController extends Page 
{
    /**
     * Método responsável por obter a renderização dos itens de depoimentos para a página
     * @param Request $request
     * @param Pagination $obPagination
     * @return string
     */
    private static function getClientItems($request, &$obPagination)
    {
        //PROPOSTAS
        $itens = '';

        //QUANTIDADE TOTAL DE REGISTROS
        $quantidadeTotal = ClientModel::getClient(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;

        //PAGINA ATUAL
        $queryParams = $request->getQueryParams(); 
        $paginaAtual = $queryParams['page'] ?? 1;

        //INSTACIA DE PAGINAÇÃO
        $obPagination = new Pagination($quantidadeTotal,$paginaAtual,3);

        //RESULTADOS DA PÁGINA
        $results = ClientModel::getClient(null,'idClient DESC',$obPagination->getLimit());

        //RENDERIZA O ITEM
        while($obClient = $results->fetchObject(ClientModel::class))
        {
             //VIEW DE PROPOSTAS
            $itens .= View::render('pages/clientes/item', [
            'nameClient' => $obClient->nameClient,
            'cpfClient' => $obClient->cpfClient,
            'cepClient' => $obClient->cepClient,
            'adressClient' => $obClient->adressClient,
            'idClient' => $obClient->idClient
        ]);  
        }

        //RETORNA AS PROPOSTAS
        return $itens;
    }

    /**
     * Método responsável por retornar o conteúdo (view) da página de Sobre
     * @param Request $request
     * @return string
     */
    public static function getClients($request)
    {
        //Instância de Organização
        $obOrganization = new Organization;

        //VIEW DE PROPOSTAS
        $content = View::render('pages/clients', [
            'name' => $obOrganization->name,
            'itens' => self::getClientItems($request, $obPagination),
            'pagination' => parent::getPagination($request, $obPagination)
        ]);  
        
        //RETORNA A VIEW DA PÁGINA
        return parent::getPage('Mtec Energia - Clientes', $content);
    }
}