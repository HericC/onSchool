<?php

namespace App\Http\Controllers;

use App\Atividade;
use App\comentsAtividade;
use App\comentsPostagem;
use App\participantesTurma;
use App\Postagem;
use App\Turma;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $auth;
    private $user;
    private $turmas;
    private $participantesTurma;
    private $postagem;
    private $atividade;
    private $comentsPostagem;
    private $comentsAtividade;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Auth $auth,
        User $user,
        Turma $turmas,
        participantesTurma $participantesTurma,
        Postagem $postagem,
        Atividade $atividade,
        comentsPostagem $comentsPostagem,
        comentsAtividade $comentsAtividade
    ) {
        $this->middleware('auth');
        $this->auth = $auth;
        $this->user = $user;
        $this->turmas = $turmas;
        $this->participantesTurma = $participantesTurma;
        $this->postagem = $postagem;
        $this->atividade = $atividade;
        $this->comentsPostagem = $comentsPostagem;
        $this->comentsAtividade = $comentsAtividade;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $participantesTurma = $this->participantesTurma->select('turma_id')->where('my_id', $this->auth::id())->get();

        $users = $this->user->select('id', 'name', 'foto')->get();
        $turmas = [];
        $conteudos = [];
        $comentsAtividades = [];
        $comentsPostagems = [];

        foreach ($participantesTurma as $key => $value) {
            $turma = $this->turmas->find($value->turma_id);
            array_push($turmas, $turma);

            $atividades = $this->atividade->where('turma_id', $turma->id)->get();
            foreach ($atividades as $key => $atividade) {
                array_push($conteudos, $atividade);

                $comentsAtividade = $this->comentsAtividade->where('atividade_id', $atividade->id)->get();
                foreach ($comentsAtividade as $key => $comentAtividade) {
                    array_push($comentsAtividades, $comentAtividade);
                }
            }

            $postagems = $this->postagem->where('turma_id', $turma->id)->get();
            foreach ($postagems as $key => $postagem) {
                array_push($conteudos, $postagem);

                $comentsPostagem = $this->comentsPostagem->where('postagem_id', $postagem->id)->get();
                foreach ($comentsPostagem as $key => $comentPostagem) {
                    array_push($comentsPostagems, $comentPostagem);
                }
            }
        }
        return view('home', compact('users', 'turmas', 'conteudos', 'comentsAtividades', 'comentsPostagems'));
    }
}
