<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisor extends Model
{
    use HasFactory;

    // Definir o nome da tabela se for diferente do plural do nome do modelo
    protected $table = 'revisor';

    // Definir a chave primária (caso seja diferente de 'id')
    protected $primaryKey = 'ID';

    // Se a chave primária não for auto-incrementável, defina isso como falso
    public $incrementing = true;

    // Defina os campos que podem ser atribuídos em massa
    protected $fillable = ['Nome'];

    // Desative a verificação de timestamps (caso não tenha created_at ou updated_at)
    public $timestamps = false;
}
