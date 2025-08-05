<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['name'];

    /**
     * Relación con tareas
     */
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
