<?php

namespace App\Http\Controllers;

use App\Models\Palavra;
use App\Models\Tema;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PalavraController extends Controller
{
    public function ameacar(int $id): View
    {
        try {
            return view('palavra.ameaca', ['palavra' => Palavra::findOrFail($id)]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro(($exception->getMessage()));
        }
    }

    public function atualizar(Request $request, int $id): View
    {
        try {
            $palavra = Palavra::findOrFail($id);
            $palavra->update($request->all());
            return $this->listar($request->nome);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro(($exception->getMessage()));
        }
    }

    public function cadastrar(): View
    {
        try {
            return view('palavra.cadastro', ['temas' => Tema::sorted()]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro(($exception->getMessage()));
        }
    }

    public function editar(int $id): View
    {
        try {
            return view('palavra.edicao', ['palavra' => Palavra::findOrFail($id), 'temas' => Tema::sorted()]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro(($exception->getMessage()));
        }
    }

    public function digitarTrecho(): View
    {
        return view('palavra.digitar-trecho');
    }

    public function excluir(int $id): View
    {
        try {
            $palavra = Palavra::findOrFail($id);
            $palavra->delete();
            return $this->digitarTrecho();
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro(($exception->getMessage()));
        }
    }

    public function inserir(Request $request): View
    {
        try {
            Palavra::create($request->all());
            return $this->listar($request->nome);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro(($exception->getMessage()));
        }
    }

    public function listar(string $trecho): View
    {
        try {
            return view('palavra.lista', ['palavras' => Palavra::comTrecho($trecho)]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro(($exception->getMessage()));
        }
    }
}
