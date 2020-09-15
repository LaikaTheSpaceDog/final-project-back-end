<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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

    public static function createMultiple(Array $links, Word $word)
    {
        foreach($links as $link) {
            Link::create([
                "link"=>$link["link"],
                "word_id"=>$word->id
            ]);
        }
    }

    public static function wordLinks(Collection $links)
    {
        foreach($links as $link){
            return [
                "id" => $link->id,
                "link" => $link->link
            ];
        }
    }

}
