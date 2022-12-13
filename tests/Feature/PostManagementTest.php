<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use App\Author;
use App\User;
use Laravel\Sanctum\Sanctum;

class PostManagementTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function get_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertOk();
    }

    /** @test */
    public function get_all_post()
    {
        factory(Post::class)->create();
        factory(Post::class)->create();
        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertOk();
        dd($response['data']); die;
        $this->assertIsArray($response['data']);
        $this->assertCount(2,$response['data']);
    }

    /** @test */
    public function deletePost()
    {
        $this->withoutExceptionHandling();
        Sanctum::actingAs(factory(User::class)->create());
        $post = factory(Post::class)->create();
        //var_dump($post); die;
        $response = $this->delete('/posts/'.$post->id);
        
        $response->assertStatus(200);
        $response->assertOk();
        $this->assertCount(0,Post::all());
    }

    /** @test */
    public function createPost()
    {
        $this->withoutExceptionHandling();
        Sanctum::actingAs(factory(User::class)->create());
        $response = $this->post('/posts/store',[
            'title'=>'test',
            'body'=>'testBody']);

        $response->assertStatus(200);
        $response->assertOk();
        $this->assertCount(1,Post::all());
    }

    /** @test */
    public function titleRequiredPost()
    {
        Sanctum::actingAs(factory(User::class)->create());
        $response = $this->post('/posts/store',[
            'title'=>'',
            'body'=>'testBody']);

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function bodyRequiredPost()
    {
        Sanctum::actingAs(factory(User::class)->create());
        $response = $this->post('/posts/store',[
            'title'=>'test',
            'body'=>'']);

        $response->assertSessionHasErrors('body');
    }
    
    /** @test */
    public function updatePost()
    {
        $post = factory(Post::class)->create();
        Sanctum::actingAs(factory(User::class)->create());
        //dd($post); die;
        $response = $this->patch('/posts/'.$post->id.'/edit',[
            'title'=> 'new_title',
            'body'=> 'new_body']);
        
        $get = Post::find($post->id);
        //var_dump($get); die;
        $response->assertStatus(200);
        $response->assertOk();
        $this->assertEquals('new_title', $get->title);
        $this->assertEquals('new_body',$get->body);
        $this->assertEquals($post->id, $get->id);
    }

    /** @test */
    // public function addAuthorOnPost()
    // {
    //     $response = $this->post('/posts/store',[
    //         'title'=>'test',
    //         'body'=>'testBody',
    //         'author_id'=>9]);
    //     $post = Post::first();
    //     $author = Author::first();
    //     //dd($post->author_id); die;
    //     //$this->assertEquals($author->id, $post->author_id);
    //     //$this->assertCount(1,Author::all());
    // }

}
