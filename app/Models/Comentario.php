<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model{
    use HasFactory;
    public function incidencia(): BelongsTo{
        return $this->belongsTo(Incidencia::class);
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}

