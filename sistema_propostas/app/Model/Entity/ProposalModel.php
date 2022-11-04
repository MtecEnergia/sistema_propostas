<?php

namespace App\Model\Entity;

use \Database\Database;

class ClientModel 
{
    /**
     * ID do cliente
     * @var integer
     */
    public $idClient;

    /**
     * nome de usuario do cliente
     * @var string
     */
    public $nameClient;

    /**
     * CPF do cliente
     * @var string
     */
    public $cpfClient;

    /**
     * Método responsável por cadastrar a instância atual no banco de dados
     * @return boolean
     */
    public function cadastrar()
    {
    //INSERE O CLIENTE NO BANCO DE DADOS
    $this->idClient = (new Database('client'))->insert([
        'nameClient' => $this->nameClient,
        'cpfClient'  => $this->cpfClient
    ]);

    //SUCESSO
    return true;
    }

    /**
     * Método responsável por retornar Propostas
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public static function getClient($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('client'))->select($where,$order,$limit,$fields);
    }
}