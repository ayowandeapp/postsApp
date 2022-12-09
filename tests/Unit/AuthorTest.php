<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Author;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function checkDobNullable()
    {
        Author::firstOrCreate([
                'name'=>'wande']);
        $this->assertCount(1,Author::all());
    }
}
