<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstiloMusical extends Model
{
    use HasFactory;

        // Definindo a tabela associada ao modelo
        protected $table = 'estilos_musicais';

        // Definindo os campos que podem ser preenchidos em massa
        protected $fillable = ['estilo_musical'];
    
        // Definindo o relacionamento com o modelo Instrumento
        public function instrumentos()
        {
            return $this->hasMany(Instrumento::class);
        }
}
