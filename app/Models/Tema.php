<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public $timestamps = false;

    public function numeroDePalavras(int $id): int
    {
        return count(Palavra::where('tema_id', $id)->get());
    }

    public static function sorted(): Collection
    {
        return Tema::orderBy('nome', 'asc')->get();
    }
}
