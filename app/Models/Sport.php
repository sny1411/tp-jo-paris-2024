<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime'
    ];

    protected $fillable = [
        'nom',
        'description',
        'annee_ajout',
        'nb_disciplines',
        'nb_epreuves',
        'date_debut',
        'date_fin'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
