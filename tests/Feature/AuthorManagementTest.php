<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Author;
use Carbon\Carbon;
use App\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Auth;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function create_an_author()
    {
        $response = $this->post('/author/create',[
            'name'=>'wande',
            'dob'=>'3/5/2000']);
        $author = Author::first();
        //dd($author);die;
        // $this->assertCount(1, $author);
        $response->assertOk();
        $this->assertInstanceOf(Carbon::class, $author->dob);
        $this->assertEquals('03/05/2000', $author->dob->format('m/d/Y'));

    }
    /** @test */
    public function login_a_user()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $response = $this->post('/author/login',[
            'email'=>$user->email,
            'password'=>'password']);

        $this->assertAuthenticated();
        $this->assertArrayHasKey('token', $response);
        $this->assertEquals($user->name, $response['name']);
        $response->assertOk();
        $response->assertStatus(200);
    }
     /** @test */
    public function login_failed_password_not_correct()
    {
        $user = factory(User::class)->create();
        $response = $this->post('/author/login',[
            'email'=>$user->email,
            'password'=>'wrong']);

        $this->assertGuest();
        $response->assertStatus(302);
        $response->assertSessionHasErrors();
    }

    // /** @test */
    // public function logout_a_user()
    // {
    //     $this->withoutExceptionHandling();
    //     Sanctum::actingAs(factory(User::class)->create());
    //     $response = $this->post('/logout');
    //     //check if authenticated
    //     $this->assertGuest();

    // }
    /** @test */
    public function signup_a_user()
    {
        $response = $this->post('/author/signup',[
            'name'=>'wande',
            'email'=>'wande@gmail.com',
            'password'=>'password']);

        $this->assertArrayHasKey('token', $response);
        $this->assertEquals('wande', $response['name']);
        $response->assertOk();
        $response->assertStatus(200);

    }
    

    
}
