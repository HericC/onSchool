<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    private $auth;
    private $user;

    public function __construct(Auth $auth, User $user)
    {
        $this->auth = $auth;
        $this->user = $user;
    }

    public function editarPerfil(Request $request)
    {
        if ($request->editarName && $request->editarEmail) {
            $this->user = $this->user->find($this->auth::id());

            if ($request->editarName !== $this->auth::user()->name) {
                $this->user->name = $request->editarName;
            }
            if ($request->editarEmail !== $this->auth::user()->email) {
                $this->user->email = $request->editarEmail;
            }
            if ($request->editarInstituicao !== $this->auth::user()->instituicao) {
                $this->user->instituicao = $request->editarInstituicao;
            }
            if ($request->editarCurso !== $this->auth::user()->curso) {
                $this->user->curso = $request->editarCurso;
            }
            if ($request->editarCidade !== $this->auth::user()->cidade) {
                $this->user->cidade = $request->editarCidade;
            }
            if ($request->editarNascimento !== $this->auth::user()->nascimento) {
                $this->user->nascimento = $request->editarNascimento;
            }

            if ($request->hasFile('uploadFoto') && $request->file('uploadFoto')->isValid()) {
                $upload = $request->uploadFoto->store('fotosPerfil');

                if ($upload) {
                    $userFoto = $this->auth::user()->foto;
                    $this->user->foto = $upload;
                    if ($userFoto !== 'fotosPerfil/icon-default.png') {
                        Storage::delete($userFoto);
                    }
                }
            }
            $this->user->save();
        }
        return redirect('/home');
    }

    public function search(Request $request)
    {
        $palavra = $request->palavra;
        $users = $this->user->where('name', 'LIKE', "{$palavra}%")->get();

        if (count($users) > 0) {
            foreach ($users as $key => $value) {
                echo "
                <li class='p-2 mt-2 rounded bg-white'>
                <figure class='rounded-circle mt-1'>
                    <img src='storage/$value->foto' alt='Foto do Perfil' title='Foto de Perfil de $value->name'>
                </figure>

                <button class='btn btn-primary float-right'>Enviar Pedido de Amizade</button>
                <span class='float-left m-0 ml-2 mt-2'>$value->name</span>
                ";
            }
        }
    }
}
