<?php

namespace App\Controllers;

use App\Models\DAO\UsuarioDAO;
use App\Lib\Sessao;

class HomeController extends Controller
{
    public function index()
    {
        $usuarioDAO = new UsuarioDAO();

        self::setViewParam('listaArtigos', $usuarioDAO->listarLimit());

        $this->render('home/index');
        Sessao::limpaMensagem(); 
        
    }
}