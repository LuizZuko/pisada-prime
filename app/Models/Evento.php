<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'user_id',
        'titulo',
        'descricao',
        'data_evento',
        'local',
        'preco_ingresso',
        'capacidade',
    ];

    protected $casts = [
        'data_evento' => 'datetime',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function organizador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
