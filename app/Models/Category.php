<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Permet d'insérer le nom de la catégorie
    protected $fillable = ['name'];

    // Relation : Une catégorie possède plusieurs tâches
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}