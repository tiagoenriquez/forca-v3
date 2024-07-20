<?php

namespace App\Utils;

class Segredo
{
    public $caracteres = '';

    public function __construct(string $palavra)
    {
        for ($i = 0; $i < strlen($palavra); $i++) {
            $this->caracteres .= '_';
        }
    }
}