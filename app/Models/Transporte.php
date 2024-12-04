<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    // Defina o nome da tabela caso seja diferente da convenção
    protected $table = 'transporte';

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = ['Tipo'];

    // Caso sua tabela não tenha os campos 'created_at' e 'updated_at', desative o controle de timestamps
    public $timestamps = false;
}
