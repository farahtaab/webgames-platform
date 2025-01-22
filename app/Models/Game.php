<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'url', 'image_url'];

    // Relació amb Rating
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
