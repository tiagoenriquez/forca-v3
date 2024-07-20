<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dica extends Model
{
    use HasFactory;

    protected $fillable = ['texto', 'palavra_id'];

    public $timestamps = false;

    public function palavra(): BelongsTo
    {
        return $this->belongsTo(Palavra::class);
    }

    public static function sorteada(int $temaId): Dica
    {
        $dicas = Dica::join('palavras', 'dicas.palavra_id', 'palavras.id')->where('palavras.tema_id', $temaId)->get();
        $dica = $dicas->get(rand(0, count($dicas) - 1));
        if ($dica === null) {
            throw new \Exception('Não exista palavra cadastrada para o tema escolhido.');
        }
        return $dica;
    }

    public static function todasComTrecho(string $trecho): Collection
    {
        return Dica::where('texto', 'like', '%' . $trecho . '%')->get();
    }

    public static function todasDaPalavra(int $palavraId): Collection
    {
        return Dica::where('palavra_id', $palavraId)->get();
    }
}
