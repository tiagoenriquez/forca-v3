<?php

namespace App\Http\Controllers;

use App\Models\Dica;
use App\Models\Forca;
use App\Models\Tema;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ForcaController extends Controller
{
    public function escolherTema(): View
    {
        try {
            return view('forca.escolher-tema', ['temas' => Tema::sorted()]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function iniciar(Request $request): View
    {
        try {
            $dica = Dica::sorteada($request->tema_id);
            return view('forca.jogo', [
                'forca' => Forca::iniciar($dica),
                'forcas' => []
            ]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function jogarOutra(Request $request): View
    {
        try {
            $dica = Dica::sorteada(json_decode($request->forca)->dica->palavra->tema_id);
            return view('forca.jogo', [
                'forca' => Forca::iniciar($dica),
                'forcas' => json_decode($request->forcas)
            ]);
        } catch (\Exception $exception) {
            return $this->mostrarMensagemDeErro($exception->getMessage());
        }
    }

    public function submeterLetra(Request $request): View
    {
        $forca = Forca::recompor(json_decode($request->forca));
        $forcas = json_decode($request->forcas);
        $forca->submeterLetra($request->letra);
        if ($forca->estado !== 'em andamento') {
            $forcas = Forca::inserir($forcas, $forca);
            $estatistica = Forca::estatistica($forcas);
            if ($forca->estado === 'vitoria') {
                return $this->vencer($forca, $forcas, $estatistica);
            } 
            return $this->perder($forca, $forcas, $estatistica);
        }
        return $this->continuar($forca, $forcas);
    }

    private function continuar(Forca $forca, array $forcas): View
    {
        return view('forca.jogo', [
            'forca' => $forca,
            'forcas' => $forcas
        ]);
    }

    private function perder(Forca $forca, array $forcas, array $estatistica): View
    {
        return view('forca.derrota', [
            'forca' => $forca,
            'forcas' => $forcas,
            'estatistica' => $estatistica
        ]);
    }

    private function vencer(Forca $forca, array $forcas, array $estatistica): View
    {
        return view('forca.vitoria', [
            'forca' => $forca,
            'forcas' => $forcas,
            'estatistica' => $estatistica
        ]);
    }
}