<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $fillable = ['instrumento_id', 'titulo', 'letra', 'imagens'];

    // Relacionamento com Instrumento
    public function instrumento()
    {
        return $this->belongsTo(Instrumento::class);
    }

    
}
