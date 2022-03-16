<?php

namespace Tests\Unit\Policies;

use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class BlogPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_blog()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Blog));
    }

    /** @test */
    public function user_can_view_blog()
    {
        $user = $this->createUser();
        $blog = Blog::factory()->create();
        $this->assertTrue($user->can('view', $blog));
    }

    /** @test */
    public function user_can_update_blog()
    {
        $user = $this->createUser();
        $blog = Blog::factory()->create();
        $this->assertTrue($user->can('update', $blog));
    }

    /** @test */
    public function user_can_delete_blog()
    {
        $user = $this->createUser();
        $blog = Blog::factory()->create();
        $this->assertTrue($user->can('delete', $blog));
    }
}
