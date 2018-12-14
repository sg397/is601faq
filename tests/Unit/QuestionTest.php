<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\Types\Integer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $this->assertTrue($question->save());
    }

    public function testQViewCountInt()
    {
        $question = \App\Question::inRandomOrder()->first();
        try{
            $this->assertInternalType("int", (int)$question->view_count);
        }catch(Exception $e){
            $this->assetTrue(false);
        }
    }
}
