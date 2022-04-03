<?php

namespace Tests\Feature;

use App\Models\Schedule;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageScheduleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_schedule_list_in_schedule_index_page()
    {
        $schedule = Schedule::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('schedules.index');
        $this->see($schedule->name);
    }

    /** @test */
    public function user_can_create_a_schedule()
    {
        $this->loginAsUser();
        $this->visitRoute('schedules.index');

        $this->click(__('schedule.create'));
        $this->seeRouteIs('schedules.index', ['action' => 'create']);

        $this->submitForm(__('schedule.create'), [
            'name'        => 'Schedule 1 name',
            'description' => 'Schedule 1 description',
        ]);

        $this->seeRouteIs('schedules.index');

        $this->seeInDatabase('schedules', [
            'name'        => 'Schedule 1 name',
            'description' => 'Schedule 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Schedule 1 name',
            'description' => 'Schedule 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_schedule_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('schedules.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_schedule_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('schedules.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_schedule_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('schedules.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_schedule_within_search_query()
    {
        $this->loginAsUser();
        $schedule = Schedule::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('schedules.index', ['q' => '123']);
        $this->click('edit-schedule-'.$schedule->id);
        $this->seeRouteIs('schedules.index', ['action' => 'edit', 'id' => $schedule->id, 'q' => '123']);

        $this->submitForm(__('schedule.update'), [
            'name'        => 'Schedule 1 name',
            'description' => 'Schedule 1 description',
        ]);

        $this->seeRouteIs('schedules.index', ['q' => '123']);

        $this->seeInDatabase('schedules', [
            'name'        => 'Schedule 1 name',
            'description' => 'Schedule 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Schedule 1 name',
            'description' => 'Schedule 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_schedule_name_update_is_required()
    {
        $this->loginAsUser();
        $schedule = Schedule::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('schedules.update', $schedule), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_schedule_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $schedule = Schedule::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('schedules.update', $schedule), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_schedule_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $schedule = Schedule::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('schedules.update', $schedule), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_schedule()
    {
        $this->loginAsUser();
        $schedule = Schedule::factory()->create();
        Schedule::factory()->create();

        $this->visitRoute('schedules.index', ['action' => 'edit', 'id' => $schedule->id]);
        $this->click('del-schedule-'.$schedule->id);
        $this->seeRouteIs('schedules.index', ['action' => 'delete', 'id' => $schedule->id]);

        $this->seeInDatabase('schedules', [
            'id' => $schedule->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('schedules', [
            'id' => $schedule->id,
        ]);
    }
}
