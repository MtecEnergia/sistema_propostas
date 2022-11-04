<?php

namespace App\Http\Middleware;

class Maintenance
{
    /**
     * Método responsável por executar o middleware
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle($request, $next)
    {
        //VERIFICA O ESTADO DE MANUTENÇÃO DA PÁGINA 
        if (getenv('MAINTENANCE') == 'true') {
            throw new \Exception("Estamos em manutenção :/  Tente novamente mais tarde", 200);
        }

        //EXECUTA O PRÓXIMO NIVEL DO MIDDLEWARE
        return $next($request);
    }
}