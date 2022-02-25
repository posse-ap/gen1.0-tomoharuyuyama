<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\BigQuestion;
// use database\factories\BigQuestionFactory;

class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();
        $title = factory(BigQuestion::class)->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertSee('東京の難読地名クイズ');
        $response->assertSee($title->name);
        $response->assertStatus(200);
    }
}
