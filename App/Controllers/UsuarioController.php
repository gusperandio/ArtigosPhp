<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Lib\Paginacao;
use App\Models\DAO\UsuarioDAO;
use App\Models\Validacao\ArtigoValidacao;
use App\Models\Entidades\Usuario;
use App\Models\Entidades\Artigos;

class UsuarioController extends Controller
{


    public function cadastro()
    {
        $this->render('/usuario/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();

    }

    public function cadastroArtigo()
    {

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();

        $this->render('/usuario/cadastroArtigo');

    }

    public function AllArtigos($params)
    {
        $usuarioDAO = new UsuarioDAO();

        self::setViewParam('listaArtigos', $usuarioDAO->listar());

        $paginaSelecionada  = isset($_GET['paginaSelecionada']) ? $_GET['paginaSelecionada'] : 1;
        $totalPorPagina     = 6;

        if (isset($_GET['buscaArtigo'])) {

            $listaArtigo      = $usuarioDAO->buscaComPaginacao($_GET['buscaArtigo'], $totalPorPagina, $paginaSelecionada);

            $paginacao = new Paginacao($listaArtigo);

            self::setViewParam('listaArtigos', $_GET['listaArtigos']);
            self::setViewParam('paginacao', $paginacao->criandoLink($_GET['listaArtigos']));
            self::setViewParam('queryString', Paginacao::criandoQuerystring($_GET['paginaSelecionada'], $_GET['listaArtigos']));

            self::setViewParam('listaArtigos', $listaArtigo['resultado']);
        }

        $this->render('/usuario/allartigos');
    }

    public function salvar()
    {
        $usuario = new Usuario();
        $usuario->setNome($_POST['nomeDev']);
        $usuario->setNivel($_POST['nivel']);
        $usuario->setData($_POST['data_nascimento']);

        Sessao::gravaFormulario($_POST);

        $usuarioDAO = new UsuarioDAO();

        if ($usuarioDAO->verificaDev($_POST['nomeDev'])) {
            Sessao::gravaMensagem("Nome já existe");
            $this->redirect('/usuario/cadastro');
        }

        if ($usuarioDAO->salvar($usuario)) {
            $this->redirect('/usuario/sucesso');
        } else {
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }

    public function salvarArtigo()
    {
        $artigo = new Artigos();
        $artigo->setNomeArtigo($_POST['nome_artigo']);
        $artigo->setResumoArtigo($_POST['resumo']);
        $artigo->setDevsArtigo($_POST['devs']);
        $artigo->setArtigo($_POST['artigo_completo']);

        Sessao::gravaFormulario($_POST);

        $usuarioDAO = new UsuarioDAO();

        if ($usuarioDAO->verificaArtigo($_POST['nome_artigo'])) {
            Sessao::gravaMensagem("Nome de artigo já existe");
            $this->redirect('/usuario/cadastroArtigo');
        }

        if ($usuarioDAO->salvarArtigo($artigo)) {
            $this->redirect('/usuario/sucessoArtigo');
        } else {
            Sessao::gravaMensagem("Erro ao gravar");
        }
    }

    public function sucesso()
    {
        if (Sessao::retornaValorFormulario('nomeDev')) {
            $this->render('/usuario/sucesso');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        } else {
            $this->redirect('/');
        }
    }

    public function sucessoArtigo()
    {
        if (Sessao::retornaValorFormulario('nome_artigo')) {
            $this->render('/usuario/sucessoArtigo');

            Sessao::limpaFormulario();
            Sessao::limpaMensagem();
        } else {
            $this->redirect('/');
        }
    }


    public function edicao($params)
    {
        $id_artigo = $params[0];

        $artigoDAO = new UsuarioDAO();

        $artigo = $artigoDAO->listar($id_artigo);

        if (!$artigo) {
            Sessao::gravaMensagem("Artigo inexistente");
            $this->redirect('/artigos');
        }

        self::setViewParam('artigos', $artigo);

        $this->render('/usuario/edicao');

        Sessao::limpaMensagem();
    }


    //Atualizar artigo
    public function atualizar()
    {

        $artigo = new Artigos();
        $artigo->setId($_POST['id_artigo']);
        $artigo->setNomeArtigo($_POST['nome_artigo']);
        $artigo->setDevsArtigo($_POST['devs']);
        $artigo->setResumoArtigo($_POST['resumo']);
        $artigo->setArtigo($_POST['artigo_completo']);

        Sessao::gravaFormulario($_POST);

        $artigoValidator = new ArtigoValidacao();
        $artigoValidacao = $artigoValidator->validar($artigo);

        if ($artigoValidacao->getErros()) {
            Sessao::gravaErro($artigoValidacao->getErros());
            $this->redirect('/usuario/edicao/' . $_POST['id_artigo']);
        }

        $usuarioDAO = new UsuarioDAO();

        $usuarioDAO->atualizar($artigo);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/');
    }

    //Excluir
    public function exclusao($params)
    {
        $id_artigo = $params[0];

        $artigoDAO = new UsuarioDAO();

        $artigo = $artigoDAO->listar($id_artigo);

        if (!$artigo) {
            Sessao::gravaMensagem("Artigo inexistente");
            $this->redirect('/artigos');
        }

        self::setViewParam('listaArtigos', $artigo);

        $this->render('/usuario/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $artigo = new Artigos();
        $artigo->setId($_POST['id_artigo']);

        $artigoDAO = new UsuarioDAO();

        if (!$artigoDAO->excluir($artigo)) {
            Sessao::gravaMensagem("Artigo inexistente");
            $this->redirect('/allartigos');
        }

        Sessao::gravaMensagem("Artigo excluido com sucesso!");

        $this->redirect('/usuario/allartigos');
    }
}
