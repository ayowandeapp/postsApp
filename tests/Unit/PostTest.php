<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function AuthorId()
    {
        Post::firstOrCreate([
                'title'=>'wande',
                'body'=>'good book',
                'author_id'=>1]);
        $this->assertCount(1,Post::all());
    }
}
