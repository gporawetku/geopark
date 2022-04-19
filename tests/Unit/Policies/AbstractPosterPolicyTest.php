<?php

namespace Tests\Unit\Policies;

use App\Models\AbstractPoster;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class AbstractPosterPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_abstract_poster()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new AbstractPoster));
    }

    /** @test */
    public function user_can_view_abstract_poster()
    {
        $user = $this->createUser();
        $abstractPoster = AbstractPoster::factory()->create();
        $this->assertTrue($user->can('view', $abstractPoster));
    }

    /** @test */
    public function user_can_update_abstract_poster()
    {
        $user = $this->createUser();
        $abstractPoster = AbstractPoster::factory()->create();
        $this->assertTrue($user->can('update', $abstractPoster));
    }

    /** @test */
    public function user_can_delete_abstract_poster()
    {
        $user = $this->createUser();
        $abstractPoster = AbstractPoster::factory()->create();
        $this->assertTrue($user->can('delete', $abstractPoster));
    }
}
