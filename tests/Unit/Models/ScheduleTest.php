<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class ScheduleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_schedule_has_name_link_attribute()
    {
        $schedule = Schedule::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $schedule->name, 'type' => __('schedule.schedule'),
        ]);
        $link = '<a href="'.route('schedules.show', $schedule).'"';
        $link .= ' title="'.$title.'">';
        $link .= $schedule->name;
        $link .= '</a>';

        $this->assertEquals($link, $schedule->name_link);
    }

    /** @test */
    public function a_schedule_has_belongs_to_creator_relation()
    {
        $schedule = Schedule::factory()->make();

        $this->assertInstanceOf(User::class, $schedule->creator);
        $this->assertEquals($schedule->creator_id, $schedule->creator->id);
    }
}
