<?php

namespace App\Http\Resources;

use App\Models\Palavra;
use Illuminate\Database\Eloquent\Collection;

class DicaResource
{
    public int $id;
    public string $texto;
    public int $palavra_id;
    public Palavra $palavra;

    public function __construct(int $id, string $texto, int $palavra_id, Palavra $palavra)
    {
        $this->id = $id;
        $this->texto = substr($texto, 0, 64) . '[...]';
        $this->palavra_id = $palavra_id;
        $this->palavra = $palavra;
    }

    public static function collection(Collection $dicasCollection): array
    {
        $dicas = [];
        foreach ($dicasCollection as $dicaCollection) {
            array_push($dicas, new self(
                $dicaCollection->id,
                $dicaCollection->texto,
                $dicaCollection->palavra_id,
                $dicaCollection->palavra
            ));
        }
        return $dicas;
    }
}