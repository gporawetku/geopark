<?php

namespace Tests\Unit\Policies;

use App\Models\Slide;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SlidePolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_slide()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Slide));
    }

    /** @test */
    public function user_can_view_slide()
    {
        $user = $this->createUser();
        $slide = Slide::factory()->create();
        $this->assertTrue($user->can('view', $slide));
    }

    /** @test */
    public function user_can_update_slide()
    {
        $user = $this->createUser();
        $slide = Slide::factory()->create();
        $this->assertTrue($user->can('update', $slide));
    }

    /** @test */
    public function user_can_delete_slide()
    {
        $user = $this->createUser();
        $slide = Slide::factory()->create();
        $this->assertTrue($user->can('delete', $slide));
    }
}
