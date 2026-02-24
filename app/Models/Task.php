<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    // 1. Autoriser l'enregistrement des données (Sécurité)
    protected $fillable = [
        'title', 
        'description', 
        
        'status', 
        'user_id', 
        'category_id'
    ];

    /**
     * 2. RELATION : Une tâche appartient à une catégorie (Inscriptions, etc.)
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 3. RELATION : Une tâche appartient à un utilisateur (la secrétaire)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}