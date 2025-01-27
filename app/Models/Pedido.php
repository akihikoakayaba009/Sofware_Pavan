<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';


    protected $primaryKey = 'ID';  // Defina a chave primária caso seja diferente de 'id'
   
    protected $fillable = [
        'N_Serie',
        'Comprimento',
        'Largura',
        'Altura',
        'Assoalho',
        'Porta_T',
        'Porta_LD',
        'Porta_LE',
        'Modelo',
        'Material',
        'ID_Transporte',
        'Base',
        'ID_Projetista',
        'ID_Revisor',
        'ID_Caminhao',
        'ID_Cliente',
        'ID_Destino',
        'data_pedido',
        'arquivo_url', // Adicionando o campo arquivo_url
    ];

    // Relacionamento com o cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_Cliente');
    }

    // Relacionamento com o projetista
    public function projetista()
    {
        return $this->belongsTo(Projetista::class, 'ID_Projetista');
    }

    // Relacionamento com o revisor
    public function revisor()
    {
        return $this->belongsTo(Revisor::class, 'ID_Revisor');
    }

    // Relacionamento com o caminhão
    public function caminhao()
    {
        return $this->belongsTo(Caminhao::class, 'ID_Caminhao');
    }

    // Relacionamento com o destino
    public function destino()
    {
        return $this->belongsTo(Destino::class, 'ID_Destino');
    }

    // Relacionamento com o transporte
    public function transporte()
    {
        return $this->belongsTo(Transporte::class, 'ID_Transporte');
    }
}
