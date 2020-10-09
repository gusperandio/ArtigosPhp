<?php

namespace App\Models\Entidades;

class Usuario
{
    private $id;
    private $nomeDev;
    private $data;
    private $nivel;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nomeDev;
    }

    public function setNome($nomeDev)
    {
        $this->nomeDev = $nomeDev;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getNivel()
    {
        return $this->nivel;
    }

    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }
}