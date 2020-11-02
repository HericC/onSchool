<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\comentsAtividade;
use App\comentsPostagem;
use App\Postagem;
use App\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class conteudoController extends Controller
{
    private $auth;
    private $turma;
    private $postagem;
    private $atividade;
    private $comentsPostagem;
    private $comentsAtividade;

    public function __construct(
        Auth $auth,
        Turma $turma,
        Postagem $postagem,
        Atividade $atividade,
        comentsPostagem $comentsPostagem,
        comentsAtividade $comentsAtividade
    ) {
        $this->auth = $auth;
        $this->turma = $turma;
        $this->postagem = $postagem;
        $this->atividade = $atividade;
        $this->comentsPostagem = $comentsPostagem;
        $this->comentsAtividade = $comentsAtividade;
    }

    public function postarPostagem(Request $request)
    {
        if ($request->turmaPostagem && $request->descricaoPostagem) {
            $this->postagem->turma_id = $request->turmaPostagem;
            $this->postagem->autor_id = $this->auth::id();
            $this->postagem->descricao = $request->descricaoPostagem;
            $this->postagem->save();
            return response()->json(1);
        }
    }

    public function postarAtividade(Request $request)
    {
        if ($request->turmaAtividade && $request->tituloAtividade && $request->descricaoAtividade && $request->prazoEntregaAtividade) {
            $this->atividade->turma_id = $request->turmaAtividade;
            $this->atividade->autor_id = $this->auth::id();
            $this->atividade->titulo = $request->tituloAtividade;
            $this->atividade->descricao = $request->descricaoAtividade;
            $this->atividade->entrega = $request->prazoEntregaAtividade;
            $this->atividade->save();
            return response()->json(1);
        }
    }

    public function excluirPostagem(Request $request)
    {
        $this->comentsPostagem->where('postagem_id', $request->postagem_id)->delete();
        $this->postagem->find($request->postagem_id)->delete();
        return redirect('/home');
    }

    public function excluirAtividade(Request $request)
    {
        $this->comentsAtividade->where('atividade_id', $request->atividade_id)->delete();
        $this->atividade->find($request->atividade_id)->delete();
        return redirect('/home');
    }

    public function editarPostagem(Request $request)
    {
        if ($request->editarDescricaoPostagem) {
            $this->postagem = $this->postagem->find($request->id);
            $this->postagem->descricao = $request->editarDescricaoPostagem;
            $this->postagem->save();
            return redirect('/home');
        }
    }

    public function editarAtividade(Request $request)
    {
        if ($request->editarTituloAtividade && $request->editarDescricaoAtividade && $request->editarPrazoEntregaAtividade) {
            $this->atividade = $this->atividade->find($request->id);
            $this->atividade->titulo = $request->editarTituloAtividade;
            $this->atividade->descricao = $request->editarDescricaoAtividade;
            $this->atividade->entrega = $request->editarPrazoEntregaAtividade;
            $this->atividade->save();
            return redirect('/home');
        }
    }

    public function postarComments(Request $request)
    {
        if ($request->comments) {
            switch ($request->tipoConteudoComments) {
                case '0':
                    $this->comentsPostagem->postagem_id = $request->turmaComments;
                    $this->comentsPostagem->autor_id = $this->auth::id();
                    $this->comentsPostagem->descricao = $request->comments;
                    $this->comentsPostagem->save();
                    return response()->json(1);
                    break;
                case '1':
                    $this->comentsAtividade->atividade_id = $request->turmaComments;
                    $this->comentsAtividade->autor_id = $this->auth::id();
                    $this->comentsAtividade->descricao = $request->comments;
                    $this->comentsAtividade->save();
                    return response()->json(1);
                default:
                    break;
            }
        }
    }

    public function excluirComentPostagem(Request $request)
    {
        $this->comentsPostagem->find($request->comentPostagem_id)->delete();
        return redirect('/home');
    }

    public function excluirComentAtividade(Request $request)
    {
        $this->comentsAtividade->find($request->comentAtividade_id)->delete();
        return redirect('/home');
    }
}
