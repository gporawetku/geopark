<?php

namespace Tests\Unit\Policies;

use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SchedulePolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_schedule()
    {
        $user = $this->createUser();
        $this->assertTrue($user->can('create', new Schedule));
    }

    /** @test */
    public function user_can_view_schedule()
    {
        $user = $this->createUser();
        $schedule = Schedule::factory()->create();
        $this->assertTrue($user->can('view', $schedule));
    }

    /** @test */
    public function user_can_update_schedule()
    {
        $user = $this->createUser();
        $schedule = Schedule::factory()->create();
        $this->assertTrue($user->can('update', $schedule));
    }

    /** @test */
    public function user_can_delete_schedule()
    {
        $user = $this->createUser();
        $schedule = Schedule::factory()->create();
        $this->assertTrue($user->can('delete', $schedule));
    }
}
