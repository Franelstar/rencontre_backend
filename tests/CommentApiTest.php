<?php

class CommentApiTest extends \Monolog\Test\TestCase{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        \Illuminate\Support\Facades\Artisan::call('migrate');
    }

    public function testGetComments(){
        $comment = \App\Comment::create(['content' => 'salut']);

        this.assertEquals(1, \App\Comment::count());

        this.assertEquals(1, \App\Comment::count());
    }
}
