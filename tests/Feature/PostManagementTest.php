<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use App\Author;

class PostManagementTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function homePagePost()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertOk();
    }

    /** @test */
    public function deletePost()
    {
        $this->withoutExceptionHandling();
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
        $response = $this->post('/posts/store',[
            'title'=>'test',
            'body'=>'testBody',
            'author_id'=>9]);

        $response->assertStatus(200);
        $response->assertOk();
        $this->assertCount(1,Post::all());
    }

    /** @test */
    public function titleRequiredPost()
    {
        $response = $this->post('/posts/store',[
            'title'=>'',
            'body'=>'testBody',
            'author_id'=>4]);

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function bodyRequiredPost()
    {
        $response = $this->post('/posts/store',[
            'title'=>'test',
            'body'=>'',
            'author_id'=>9]);

        $response->assertSessionHasErrors('body');
    }
    
    /** @test */
    public function updatePost()
    {
        $post = factory(Post::class)->create();
        //dd($post); die;
        $response = $this->patch('/posts/'.$post->id.'/edit',[
            'title'=> 'new_title',
            'body'=> 'new_body',
            'author_id'=>$post->id]);
        
        $get = Post::find($post->id);
        //var_dump($get); die;
        $response->assertStatus(200);
        $response->assertOk();
        $this->assertEquals('new_title', $get->title);
        $this->assertEquals('new_body',$get->body);
        $this->assertEquals($post->id, $get->author_id);
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
