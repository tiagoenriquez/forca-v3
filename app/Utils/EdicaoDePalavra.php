<?php

namespace App\Utils;

class EdicaoDePalavra
{
    public string $palavra;

    public function __construct(string $palavra)
    {
        $this->palavra = strtoupper($palavra);
        $this->palavra = str_replace('Á', 'A', $this->palavra);
        $this->palavra = str_replace('Â', 'A', $this->palavra);
        $this->palavra = str_replace('Ã', 'A', $this->palavra);
        $this->palavra = str_replace('Ç', 'C', $this->palavra);
        $this->palavra = str_replace('É', 'E', $this->palavra);
        $this->palavra = str_replace('Ê', 'E', $this->palavra);
        $this->palavra = str_replace('Í', 'I', $this->palavra);
        $this->palavra = str_replace('Ó', 'O', $this->palavra);
        $this->palavra = str_replace('Ô', 'O', $this->palavra);
        $this->palavra = str_replace('Õ', 'O', $this->palavra);
        $this->palavra = str_replace('Ú', 'U', $this->palavra);
        $this->palavra = str_replace('á', 'A', $this->palavra);
        $this->palavra = str_replace('â', 'A', $this->palavra);
        $this->palavra = str_replace('ã', 'A', $this->palavra);
        $this->palavra = str_replace('ç', 'C', $this->palavra);
        $this->palavra = str_replace('é', 'E', $this->palavra);
        $this->palavra = str_replace('ê', 'E', $this->palavra);
        $this->palavra = str_replace('í', 'I', $this->palavra);
        $this->palavra = str_replace('ó', 'O', $this->palavra);
        $this->palavra = str_replace('ô', 'O', $this->palavra);
        $this->palavra = str_replace('õ', 'O', $this->palavra);
        $this->palavra = str_replace('ú', 'U', $this->palavra);
    }
}