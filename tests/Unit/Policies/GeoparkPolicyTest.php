<?php

namespace Tests\Unit\Policies;

use App\Models\Geopark;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class GeoparkPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_geopark()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Geopark));
    }

    /** @test */
    public function user_can_view_geopark()
    {
        $user = $this->createUser();
        $geopark = Geopark::factory()->create();
        $this->assertTrue($user->can('view', $geopark));
    }

    /** @test */
    public function user_can_update_geopark()
    {
        $user = $this->createUser();
        $geopark = Geopark::factory()->create();
        $this->assertTrue($user->can('update', $geopark));
    }

    /** @test */
    public function user_can_delete_geopark()
    {
        $user = $this->createUser();
        $geopark = Geopark::factory()->create();
        $this->assertTrue($user->can('delete', $geopark));
    }
}
