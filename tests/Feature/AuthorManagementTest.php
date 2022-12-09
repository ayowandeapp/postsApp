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
        $this->withoutExceptionHandling();
        $response = $this->post('/author/store',[
            'name'=>'wande',
            'dob'=>'3/5/2000']);
        $author = Author::latest()->first();
        //dd($author);die;
        $response->assertOk();
        //$this->assertCount(1, $author);
        //$this->assertInstanceOf(Carbon::class, $author->first()->dob);
        //$this->assertEquals('03/05/2000', $author->first()->dob->format('m/d/Y'));

    }
}
