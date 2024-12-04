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

    // Se sua tabela tiver uma chave primária diferente de 'id', defina-a aqui:
    // protected $primaryKey = 'ID';

    // Caso a chave primária não seja auto-incremento (e.g., se for uma UUID ou outro tipo), defina o tipo da chave primária:
    // protected $keyType = 'string';

    // Caso a tabela tenha um campo de chave primária diferente, como 'ID', você pode configurá-lo:
    // public $incrementing = false;

}
