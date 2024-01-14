<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Classement
 *
 */
class Classement extends Pivot {
    use HasFactory;

    protected $fillable = ['rang', 'performance'];

    // Vous pouvez également définir les relations avec Athlete et Sport ici
    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
