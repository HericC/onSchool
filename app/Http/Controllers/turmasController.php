<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\comentsAtividade;
use App\comentsPostagem;
use App\participantesTurma;
use App\Postagem;
use App\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class turmasController extends Controller
{
    private $auth;
    private $turma;
    private $participantesTurma;
    private $postagem;
    private $atividade;
    private $comentsPostagem;
    private $comentsAtividade;

    public function __construct(
        Auth $auth,
        Turma $turma,
        participantesTurma $participantesTurma,
        Postagem $postagem,
        Atividade $atividade,
        comentsPostagem $comentsPostagem,
        comentsAtividade $comentsAtividade
    ) {
        $this->auth = $auth;
        $this->turma = $turma;
        $this->participantesTurma = $participantesTurma;
        $this->postagem = $postagem;
        $this->atividade = $atividade;
        $this->comentsPostagem = $comentsPostagem;
        $this->comentsAtividade = $comentsAtividade;
    }

    public function criarTurma(Request $request)
    {
        if ($request->nameTurma) {
            $this->turma->prof_id = $this->auth::id();
            $this->turma->name = $request->nameTurma;
            $this->turma->link = md5(uniqid(rand(), true));
            $this->turma->save();

            $this->participantesTurma->my_id = $this->auth::id();
            $this->participantesTurma->turma_id = $this->turma->id;
            $this->participantesTurma->save();

            return response()->json(1);
        }
    }

    public function sairTurma(Request $request)
    {
        $prof_id = $this->turma->select('prof_id')->find($request->turma_id)->prof_id;
        if ($prof_id === $this->auth::id()) {
            $this->participantesTurma->where('turma_id', $request->turma_id)->delete();


            $postagems_id = $this->postagem->where('turma_id', $request->turma_id)->get();
            foreach ($postagems_id as $postagem_key => $postagem_value) {
                $this->comentsPostagem->where('postagem_id', $postagem_value->id)->delete();
            }
            $this->postagem->where('turma_id', $request->turma_id)->delete();


            $atividades_id = $this->atividade->where('turma_id', $request->turma_id)->get();
            foreach ($atividades_id as $atividade_key => $atividade_value) {
                $this->comentsAtividade->where('atividade_id', $atividade_value->id)->delete();
            }
            $this->atividade->where('turma_id', $request->turma_id)->delete();


            $this->turma->find($request->turma_id)->delete();
        } else {
            $this->participantesTurma->where('my_id', $this->auth::id())->where('turma_id', $request->turma_id)->delete();
        }
        return redirect('/home');
    }

    public function entrarTurma(Request $request)
    {
        if ($request->linkTurma) {
            $turma_id = $this->turma->select('id')->where('link', $request->linkTurma)->get()[0]->id;
            $exist = $this->participantesTurma->where('my_id', $this->auth::id())->where('turma_id', $turma_id)->get();

            try {
                $exist[0];
            } catch (\Throwable $th) {
                $this->participantesTurma->my_id = $this->auth::id();
                $this->participantesTurma->turma_id = $turma_id;
                $this->participantesTurma->save();
                return response()->json(1);
            }
        }
    }

    public function editarTurma(Request $request)
    {
        if ($request->editarNameTurma) {
            $this->turma = $this->turma->find($request->id);
            $this->turma->name = $request->editarNameTurma;
            $this->turma->save();
            return redirect('/home');
        }
    }
}
