<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function ameacar(int $id): View
    {
        try {
            return view('tema.ameaca', ['tema' => Tema::findOrFail($id)]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function atualizar(Request $request, int $id): View
    {
        try {
            $tema = Tema::findOrFail($id);
            $tema->update($request->all());
            return $this->listar();
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function cadastrar(): View
    {
        return view('tema.cadastro');
    }

    public function editar(int $id): View
    {
        try {
            return view('tema.edicao', ['tema' => Tema::findOrFail($id)]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function excluir(int $id)
    {
        try {
            $tema = Tema::findOrFail($id);
            $tema->delete();
            return $this->listar();
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function inserir(Request $request): View
    {
        try {
            Tema::create($request->all());
            return $this->listar();
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function listar(): View
    {
        try {
            return view('tema.lista', ['temas' => Tema::sorted()]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }
}
