<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'nationalite', 'age'];

    public function sports()
    {
        return $this->belongsToMany(Sport::class, 'classement')
            ->withPivot(['rang', 'performance'])
            ->withTimestamps();
    }
}