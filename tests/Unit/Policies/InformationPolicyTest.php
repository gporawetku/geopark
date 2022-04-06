<?php

namespace Tests\Unit\Policies;

use App\Models\Information;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class InformationPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_information()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Information));
    }

    /** @test */
    public function user_can_view_information()
    {
        $user = $this->createUser();
        $information = Information::factory()->create();
        $this->assertTrue($user->can('view', $information));
    }

    /** @test */
    public function user_can_update_information()
    {
        $user = $this->createUser();
        $information = Information::factory()->create();
        $this->assertTrue($user->can('update', $information));
    }

    /** @test */
    public function user_can_delete_information()
    {
        $user = $this->createUser();
        $information = Information::factory()->create();
        $this->assertTrue($user->can('delete', $information));
    }
}
