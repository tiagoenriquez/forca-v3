<?php

namespace App\Models;

use App\Utils\EdicaoDePalavra;
use App\Utils\Segredo;
use stdClass;

class Forca
{
    public int $acertos;
    public int $erros;
    public string $estado;
    public string $segredo;
    public array $letrasDigitadas;
    public Dica $dica;

    public function __construct(int $acertos, int $erros, string $estado, string $segredo, array $letrasDigitadas, Dica $dica)
    {
        $this->acertos = $acertos;
        $this->erros = $erros;
        $this->estado = $estado;
        $this->segredo = $segredo;
        $this->letrasDigitadas = $letrasDigitadas;
        $this->dica = $dica;
    }

    public function submeterLetra(string | null $letra): void
    {
        if ($letra === null) {
            $letra = ' ';
        }
        array_push($this->letrasDigitadas, $letra);
        $edicaoDePalavra = new EdicaoDePalavra($this->dica->palavra->nome);
        if (!strpos('_' . $edicaoDePalavra->palavra, $letra)) {
            $this->errar();
        } else {
            $this->acertar($letra);
        }
    }

    public static function estatistica(array $forcas): array
    {
        $vitorias = 0;
        $derrotas = 0;
        $acertos = 0;
        $erros = 0;
        foreach ($forcas as $forca) {
            if ($forca->estado === 'vitoria') {
                $vitorias++;
            }
            if ($forca->estado === 'derrota') {
                $derrotas++;
            }
            $acertos += $forca->acertos;
            $erros += $forca->erros;
        }
        $jogos = $vitorias + $derrotas > 0 ? $vitorias + $derrotas : 1;
        $submissoes = $acertos + $erros > 0 ? $acertos + $erros : 1;
        return [
            'vitorias' => $vitorias,
            'derrotas' => $derrotas,
            'percentagemDeVitorias' => str_replace('.', ',', number_format($vitorias * 100 / $jogos, 2, ',')) . '%',
            'acertos' => $acertos,
            'erros' => $erros,
            'percentagemDeAcertos' => str_replace('.', ',', number_format($acertos * 100 / $submissoes, 2, ',')) . '%'
        ];
    }

    public static function iniciar(Dica $dica): Forca
    {
        $edicaoDePalavra = new EdicaoDePalavra($dica->palavra->nome);
        $segredo = new Segredo($edicaoDePalavra->palavra);
        return new Forca(0, 0, 'em andamento', $segredo->caracteres, [], $dica);
    }

    public static function inserir(array $forcas, Forca $forca): array
    {
        array_push($forcas, $forca);
        return $forcas;
    }

    public static function recompor(stdClass $forca): Forca
    {
        $dica = new Dica();
        sort($forca->letrasDigitadas);
        return new Forca(
            $forca->acertos,
            $forca->erros,
            $forca->estado,
            $forca->segredo,
            $forca->letrasDigitadas,
            $dica->fill((array) $forca->dica)
        );
    }

    private function acertar(string $letra): void
    {
        $edicaoDePalavra = new EdicaoDePalavra($this->dica->palavra->nome);
        for ($i = 0; $i < strlen($this->segredo); $i++) {
            if ($letra === $edicaoDePalavra->palavra[$i]) {
                $this->segredo[$i] = $letra;
                $this->acertos++;
            }
        }
        if ($this->acertos === strlen($this->segredo)) {
            $this->vencer();
        }
    }

    private function errar(): void
    {
        $this->erros++;
        if ($this->erros === 6) {
            $this->perder();
        }
    }

    private function perder(): void
    {
        $this->estado = 'derrota';
    }

    private function vencer(): void
    {
        $this->estado = 'vitoria';
    }
}