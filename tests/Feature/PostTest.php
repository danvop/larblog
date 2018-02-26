<?php

namespace Tests\Feature;

use App\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    // use RefreshDatabase;
    use DatabaseTransactions;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPostAdd()
    {
        $first = factory('App\Post')->create();
        $second = factory('App\Post')->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);
        
        $posts = Post::archives();
        // dd($posts);
        $this->assertEquals([
                [
                    'year' => $first->created_at->format('Y'),
                    'month'=> $first->created_at->format('F'),
                    'published' => 1
                ],
                [
                    'year' => $second->created_at->format('Y'),
                    'month'=> $second->created_at->format('F'),
                    'published' => 1
                ]
        ], $posts);
    }
}
