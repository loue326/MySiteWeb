<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'date',
        'heure',
        'lieu',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
