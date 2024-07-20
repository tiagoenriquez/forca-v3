<?php

namespace App\Http\Controllers;

use App\Http\Resources\DicaResource;
use App\Models\Dica;
use App\Models\Palavra;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DicaController extends Controller
{
    public function ameacar(int $id): View
    {
        try {
            return view('dica.ameaca', ['dica' => Dica::findOrFail($id)]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function atualizar(Request $request, int $id): View
    {
        try {
            $dica = Dica::findOrFail($id);
            $dica->update($request->all());
            return $this->listarDaPalavra($dica->palavra_id);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function cadastrar(int $palavraId): View
    {
        try {
            return view('dica.cadastro', ['palavra' => Palavra::findOrFail($palavraId)]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function digitarTrecho(): View
    {
        return view('dica.digitar-trecho');
    }

    public function editar(int $id): View
    {
        try {
            return view('dica.edicao', ['dica' => Dica::findOrFail($id) ]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function excluir(int $id): View
    {
        try {
            $dica = Dica::findOrFail($id);
            $dica->delete();
            return $this->listarDaPalavra($dica->palavra->id);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function inserir(Request $request): View
    {
        try {
            Dica::create($request->all());
            return $this->listarDaPalavra($request->palavra_id);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function listarComTrecho(string $trecho): View
    {
        try {
            return view('dica.todas-com-trecho', ['dicas' => DicaResource::collection(Dica::todasComTrecho($trecho))]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function listarDaPalavra(int $palavraId): View
    {
        try {
            return view('dica.todas-da-palavra', [
                'dicas' => DicaResource::collection(Dica::todasDaPalavra($palavraId)),
                'palavra' => Palavra::findOrFail($palavraId)
            ]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }
}
