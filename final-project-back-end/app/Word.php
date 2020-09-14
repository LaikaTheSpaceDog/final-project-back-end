<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        "word",
        "definition",
        "liked"
    ];
    
    public function links()
    {
        return $this->hasMany(Link::class);
    }
}
