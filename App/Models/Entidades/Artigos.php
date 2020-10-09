<?php

namespace App\Models\Entidades;

use DateTime;

class Artigos
{
    private $id_artigo;
    private $nome_artigo;
    private $resumo;
    private $devs;
    private $artigo_completo;

    public function getId()
    {
        return $this->id_artigo;
    }

    public function setId($id_artigo)
    {
        $this->id_artigo = $id_artigo;
    }

    //Nome do artigo
    public function getNomeArtigo()
    {
        return $this->nome_artigo;
    }

    public function setNomeArtigo($nome_artigo)
    {
        $this->nome_artigo = $nome_artigo;
    }

    //Resumo do artigo
    public function getResumoArtigo()
    {
        return $this->resumo;
    }

    public function setResumoArtigo($resumo)
    {
        $this->resumo = $resumo;
    }

    //Devs do artigo
    public function getDevsArtigo()
    {
        return $this->devs;
    }

    public function setDevsArtigo($devs)
    {
        $this->devs = $devs;
    }

    //Artigo
    public function getArtigo()
    {
        return $this->artigo_completo;
    }

    public function setArtigo($artigo_completo)
    {
        $this->artigo_completo = $artigo_completo;
    }

    public function getDataArtigo()
    {
        return new DateTime($this->data_criacao);
    }

    public function setDataCadastro($data_criacao)
    {
        $this->data_criacao = $data_criacao;
    }
}