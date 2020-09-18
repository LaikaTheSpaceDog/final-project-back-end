<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Word;
use App\Link;
use App\Http\Requests\API\WordRequest;
use App\Http\Requests\API\WordUpdateRequest;
use App\Http\Resources\API\WordResource;
use App\Http\Resources\API\WordListResource;
use App\Http\Resources\API\WordLikeResource;

class Words extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WordListResource::collection(Word::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WordRequest $request)
    {
        $data = $request->all();
        $newWord = Word::create($data);
        $word = Word::where("id", $newWord["id"])->first();
        Link::createMultiple($data["links"], $word);
        return new WordResource($word);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        return new WordResource($word);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WordUpdateRequest $request, Word $word)
    {
        $data = $request->all();
        $word->fill($data)->save();
        return new WordResource($word);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        $word->delete();
    }

    public function likedIndex()
    {
        $words = Word::all();
        $liked = $words->filter(fn($obj) => $obj->liked === 1);
        return WordLikeResource::collection($liked);
    }

    public function search(Request $request)
    {
        $word = $request->get('query');
        $word_info = Word::where('word', 'LIKE', '%' . $word . '%')->get()->sortBy('word')->first();
        return new WordResource($word_info);
    }
}
