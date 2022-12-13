<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Post;
use App\Like;
use Laravel\Sanctum\Sanctum;

class LikeManagementTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //user can like a post 

    /** @test */
    public function user_can_like_a_post()
    {
        $this->withoutExceptionHandling();
        //create a user
        Sanctum::actingAs(factory(User::class)->create());
        //create a post
        $post = factory(Post::class)->create();
        
        $response=$this->post('/posts/'.$post->id.'/like',[
            'like'=>1 ]);
        //dd($response);die;
        $response->assertOk();
        $response->assertStatus(200);
        $this->assertEquals(1,$response['data']['like']);
    }


    //user can dislike a post if he previusly liked it
    /** @test */
    public function user_can_dislike_a_post()
    {
        $this->withoutExceptionHandling();
        //create a user
        Sanctum::actingAs(factory(User::class)->create());
        //create a post
        $post = factory(Post::class)->create();
        
        $response=$this->post('/posts/'.$post->id.'/like',[
            'like'=>0 ]);
        //dd($response);die;
        $response->assertOk();
        $response->assertStatus(200);
        $this->assertEquals(0,$response['data']['like']);
    }
}
