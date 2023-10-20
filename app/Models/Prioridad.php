<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    use HasFactory;
    public function incidencia(): BelongsTo  {
        return $this->belongsTo(Incidencia::class);
    }
}
