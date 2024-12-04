<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetista extends Model
{
    use HasFactory;

    // Defina o nome da tabela caso seja diferente da convenção
    protected $table = 'projetista';

    // Se os campos não forem preenchíveis, você pode usar a propriedade $fillable
    protected $fillable = ['nome']; // Defina os campos que podem ser atribuídos em massa

    // Se a tabela não tiver um campo 'created_at' e 'updated_at', defina
    public $timestamps = false;
}
