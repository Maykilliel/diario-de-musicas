<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    use HasFactory;

    // Definindo a tabela associada ao modelo
    protected $table = 'instrumentos';

    // Definindo os campos que podem ser preenchidos em massa
    protected $fillable = ['estilo_musical_id', 'instrumento', 'data_cadastramento', 'descricao'];

    // Definindo o relacionamento com o modelo EstiloMusical
    public function estiloMusical()
    {
        return $this->belongsTo(EstiloMusical::class, 'estilo_musical_id');
    }

    public function musicas()
{
    return $this->hasMany(Musica::class);
}
}