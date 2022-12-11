<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Author;
use Carbon\Carbon;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createAuthor()
    {
        //$this->withoutExceptionHandling();
        $response = $this->post('/author/store',[
            'name'=>'wande',
            'dob'=>'3/5/2000']);
        $author = Author::first();
        //dd($author);die;
        // $this->assertCount(1, $author);
        $response->assertOk();
        $this->assertInstanceOf(Carbon::class, $author->dob);
        $this->assertEquals('03/05/2000', $author->dob->format('m/d/Y'));

    }
}
