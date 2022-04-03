<?php

namespace Tests\Unit\Policies;

use App\Models\Banner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class BannerPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_banner()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Banner));
    }

    /** @test */
    public function user_can_view_banner()
    {
        $user = $this->createUser();
        $banner = Banner::factory()->create();
        $this->assertTrue($user->can('view', $banner));
    }

    /** @test */
    public function user_can_update_banner()
    {
        $user = $this->createUser();
        $banner = Banner::factory()->create();
        $this->assertTrue($user->can('update', $banner));
    }

    /** @test */
    public function user_can_delete_banner()
    {
        $user = $this->createUser();
        $banner = Banner::factory()->create();
        $this->assertTrue($user->can('delete', $banner));
    }
}
