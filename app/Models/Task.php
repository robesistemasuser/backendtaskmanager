<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'is_done'];

    protected $casts = [
        'is_done' => 'boolean',
    ];

    /**
     * Relación con las palabras clave (keywords)
     */
    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    /**
     * Atributo accesible para Vue: completed
     */
    public function getCompletedAttribute()
    {
        return $this->is_done;
    }
}
