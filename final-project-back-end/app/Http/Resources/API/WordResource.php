<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\LinkResource;
use App\Http\Resources\API\WordLinkResource;
use App\Link;
use App\Http\Controllers\API\Words\Links;

class WordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "word" => $this->word,
            "definition" => $this->definition,
            "liked" => (bool) $this->liked,
            "links" => WordLinkResource::collection($this->links)
        ];
    }
}
