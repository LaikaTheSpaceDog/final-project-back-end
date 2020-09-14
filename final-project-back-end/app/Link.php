<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        "link",
        "word_id",
    ];
    
    public function word()
    {
        return $this->belongsTo(Word::class);
    }
}
