<?php

namespace Tests\Unit\Policies;

use App\Models\GeoparkImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class GeoparkImagePolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_geopark_image()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new GeoparkImage));
    }

    /** @test */
    public function user_can_view_geopark_image()
    {
        $user = $this->createUser();
        $geoparkImage = GeoparkImage::factory()->create();
        $this->assertTrue($user->can('view', $geoparkImage));
    }

    /** @test */
    public function user_can_update_geopark_image()
    {
        $user = $this->createUser();
        $geoparkImage = GeoparkImage::factory()->create();
        $this->assertTrue($user->can('update', $geoparkImage));
    }

    /** @test */
    public function user_can_delete_geopark_image()
    {
        $user = $this->createUser();
        $geoparkImage = GeoparkImage::factory()->create();
        $this->assertTrue($user->can('delete', $geoparkImage));
    }
}
