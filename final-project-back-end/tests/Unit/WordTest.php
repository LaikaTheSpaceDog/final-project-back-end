<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Word;
use App\Link;

class WordTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testOne()
    {
        Word::create([
            "word" => "API",
            "definition" => "An application programming interface (API) sends data back and forth between a website or app and a user. For example, they can be used to process orders and confirm payments if you are selling something online. APIs can also be offered as products to developers to help them build a site using the data available on the API.",
            "liked" => false,
        ]);

        $wordFromDB = Word::all()->first();
        $this->assertSame("API", $wordFromDB->word);
    }

    public function testTwo()
    {
        Word::create([
            "word" => "API",
            "definition" => "An application programming interface (API) sends data back and forth between a website or app and a user. For example, they can be used to process orders and confirm payments if you are selling something online. APIs can also be offered as products to developers to help them build a site using the data available on the API.",
            "liked" => false,
        ]);
        
        Link::create([
            "link" => "https://apimetrics.io/api-knowledge-base/apis-for-dummies/",
            "word_id" => 1
        ]);

        $linkFromDB = Link::all()->first();
        $this->assertSame("https://apimetrics.io/api-knowledge-base/apis-for-dummies/", $linkFromDB->link);
    }
}
