<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caminhao extends Model
{
    use HasFactory;

    // Defina a tabela associada ao model
    protected $table = 'caminhao';

    // Defina os campos que podem ser preenchidos
    protected $fillable = [
        'Caminhao',
    ];

    // Caso você esteja usando timestamps automáticos, defina os campos de data de criação e atualização
    public $timestamps = false; // Desative os timestamps se sua tabela não usar 'created_at' e 'updated_at'

    // Caso a chave primária não seja auto-incremento (e.g., se for uma UUID ou outro tipo), defina o tipo da chave primária
    protected $primaryKey = 'ID';  // Defina a chave primária caso seja diferente de 'id'
   
}
