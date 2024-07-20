<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Palavra extends Model
{
    use HasFactory;

    protected $fillable = ['tema_id', 'nome'];

    public $timestamps = false;

    public function setNomeAttribute(string $nome): void
    {
        if (count(Palavra::where('nome', $nome)->where('tema_id', $this->attributes['tema_id'])->get()) > 0) {
            throw new \Exception("O tema já contém a palavra");
        }
        $this->attributes['nome'] = $nome;
    }

    public function tema(): BelongsTo
    {
        return $this->belongsTo(Tema::class);
    }

    public static function comTrecho(string $trecho): Collection
    {
        return Palavra::where('nome', 'like', '%' . $trecho . '%')->orderBy('nome', 'asc')->get();
    }
}
