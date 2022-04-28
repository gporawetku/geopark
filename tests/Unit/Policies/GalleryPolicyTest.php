<?php

namespace Tests\Unit\Policies;

use App\Models\Gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class GalleryPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_gallery()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Gallery));
    }

    /** @test */
    public function user_can_view_gallery()
    {
        $user = $this->createUser();
        $gallery = Gallery::factory()->create();
        $this->assertTrue($user->can('view', $gallery));
    }

    /** @test */
    public function user_can_update_gallery()
    {
        $user = $this->createUser();
        $gallery = Gallery::factory()->create();
        $this->assertTrue($user->can('update', $gallery));
    }

    /** @test */
    public function user_can_delete_gallery()
    {
        $user = $this->createUser();
        $gallery = Gallery::factory()->create();
        $this->assertTrue($user->can('delete', $gallery));
    }
}
