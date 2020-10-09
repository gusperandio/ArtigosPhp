<?php

namespace App\Models\Validacao;

use App\Models\Entidades\Artigos;
use \App\Models\Validacao\ResultadoValidacao;

class ArtigoValidacao{

    public function validar(Artigos $artigo)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($artigo->getNomeArtigo()))
        {
            $resultadoValidacao->addErro('nome_artigo',"Nome Aritgo: Este campo não pode ser vazio");
        }
        
        if(empty($artigo->getResumoArtigo()))
        {
            $resultadoValidacao->addErro('resumo',"Resumo: Este campo não pode ser vazio");
        }

        if(empty($artigo->getDevsArtigo()))
        {
            $resultadoValidacao->addErro('devs',"Devs: Este campo não pode ser vazio");
        }

        if(empty($artigo->getArtigo()))
        {
            $resultadoValidacao->addErro('artigo_completo',"Artigo: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}