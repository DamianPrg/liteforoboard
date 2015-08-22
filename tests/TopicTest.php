<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TopicTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        session(['user.id' => 1]); // login user

        $this->visit('category/2-test-forum-1')->withSession(['user.id' => 1])
            ->click('Create Topic');
    }
}
