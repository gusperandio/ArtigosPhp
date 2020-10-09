<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;
use App\Models\Entidades\Artigos;

class UsuarioDAO extends BaseDAO
{
    public function verificaDev($nomeDev)
    {
        try {

            $query = $this->select(
                "SELECT * FROM dev WHERE nome = '$nomeDev' "
            );

            return $query->fetch();
        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function verificaArtigo($nome_artigo)
    {
        try {

            $query = $this->select(
                "SELECT * FROM artigos WHERE nome_artigo = '$nome_artigo' "
            );

            return $query->fetch();
        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public  function salvar(Usuario $usuario)
    {
        try {
            $nomeDev    = $usuario->getNome();
            $data       = $usuario->getData();
            $nivel      = $usuario->getNivel();
            return $this->insert(
                'dev',
                ":nome,:data_nascimento,:nivel",
                [
                    ':nome' => $nomeDev,
                    ':data_nascimento' => $data,
                    ':nivel' => $nivel
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public  function salvarArtigo(Artigos $artigo)
    {
        try {
            $nome_artigo         = $artigo->getNomeArtigo();
            $resumo              = $artigo->getResumoArtigo();
            $devs                = $artigo->getDevsArtigo();
            $artigo_completo     = $artigo->getArtigo();
            return $this->insert(
                'artigos',
                ":nome_artigo,:resumo,:devs,:artigo_completo",
                [
                    ':nome_artigo' => $nome_artigo,
                    ':resumo' => $resumo,
                    ':devs' => $devs,
                    ':artigo_completo' => $artigo_completo
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function listar($id_artigo = null)
    {
        if ($id_artigo) {
            $resultado = $this->select(
                "SELECT * FROM artigos WHERE id_artigo = $id_artigo"
            );

            return $resultado->fetchObject(Artigos::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM artigos ORDER BY id_artigo DESC'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Artigos::class);
        }

        return false;
    }

    public function listarDev($id = null)
    {
        if ($id) {
            $resultado = $this->select(
                "SELECT * FROM dev WHERE id = $id"
            );

            return $resultado->fetchObject(Usuario::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM dev ORDER BY id DESC'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class);
        }

        return false;
    }

    public  function listarLimit($id_artigo = null)
    {
        if ($id_artigo) {
            $resultado = $this->select(
                "SELECT * FROM artigos WHERE id_artigo = $id_artigo"
            );

            return $resultado->fetchObject(Artigos::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM artigos ORDER BY id_artigo DESC LIMIT 3'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Artigos::class);
        }

        

        return false;
    }


    public  function atualizar(Artigos $artigo)
    {
        try {

            $id_artigo           = $artigo->getId();
            $nome_artigo         = $artigo->getNomeArtigo();
            $resumo              = $artigo->getResumoArtigo();
            $devs                = $artigo->getDevsArtigo();
            $artigo_completo     = $artigo->getArtigo();

            return $this->update(
                'artigos',
                "nome_artigo = :nome_artigo, resumo = :resumo, devs = :devs, artigo_completo = :artigo_completo",
                [
                    ':id_artigo'        => $id_artigo,
                    ':nome_artigo'      => $nome_artigo,
                    ':resumo'           => $resumo,
                    ':devs'             => $devs,
                    ':artigo_completo'  => $artigo_completo
                ],
                "id_artigo = :id_artigo"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Artigos $artigo)
    {
        try {
            $id_artigo = $artigo->getId();

            return $this->delete('artigos', "id_artigo = $id_artigo");
        } catch (\Exception $e) {

            throw new \Exception("Erro ao deletar", 500);
        }
    }

    public  function busca($buscaArtigo)
    {


        $whereBusca = " WHERE nome_artigo LIKE '%$buscaArtigo%' OR devs = '$buscaArtigo'";

        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM artigos $whereBusca "
        );

        $resultado = $this->select(
            "SELECT * FROM artigos as artigos $whereBusca "
        );

        $totalLinhas      = $resultadoTotal->fetch()['total'];

        return ['resultado' => $resultado->fetchAll(\PDO::FETCH_CLASS, Artigos::class)];
    }

    public  function buscaComPaginacao($buscaArtigo, $totalPorPagina, $paginaSelecionada)
    {

        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;

        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);

        $whereBusca = " WHERE nome_artigo 
                                LIKE '%$buscaArtigo%' OR resumo LIKE '%$buscaArtigo%' OR devs LIKE '%$buscaArtigo%'
                         ";

        $resultadoTotal = $this->select(
            "SELECT count(*) as total FROM artigos $whereBusca "
        );

        $resultado = $this->select(
            "SELECT * FROM artigos as artigos $whereBusca LIMIT $inicio,$totalPorPagina"
        );

        $totalLinhas      = $resultadoTotal->fetch()['total'];

        return [
            'paginaSelecionada' => $paginaSelecionada,
            'totalPorPagina'    => $totalPorPagina,
            'totalLinhas'       => $totalLinhas,
            'resultado'         => $resultado->fetchAll(\PDO::FETCH_CLASS, Artigos::class)
        ];
    }
}
