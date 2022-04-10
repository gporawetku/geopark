<?php

namespace Tests\Feature;

use App\Models\Geopark;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageGeoparkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_geopark_list_in_geopark_index_page()
    {
        $geopark = Geopark::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('geoparks.index');
        $this->see($geopark->name);
    }

    /** @test */
    public function user_can_create_a_geopark()
    {
        $this->loginAsUser();
        $this->visitRoute('geoparks.index');

        $this->click(__('geopark.create'));
        $this->seeRouteIs('geoparks.index', ['action' => 'create']);

        $this->submitForm(__('geopark.create'), [
            'name'        => 'Geopark 1 name',
            'description' => 'Geopark 1 description',
        ]);

        $this->seeRouteIs('geoparks.index');

        $this->seeInDatabase('geoparks', [
            'name'        => 'Geopark 1 name',
            'description' => 'Geopark 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Geopark 1 name',
            'description' => 'Geopark 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_geopark_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('geoparks.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_geopark_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('geoparks.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_geopark_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('geoparks.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_geopark_within_search_query()
    {
        $this->loginAsUser();
        $geopark = Geopark::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('geoparks.index', ['q' => '123']);
        $this->click('edit-geopark-'.$geopark->id);
        $this->seeRouteIs('geoparks.index', ['action' => 'edit', 'id' => $geopark->id, 'q' => '123']);

        $this->submitForm(__('geopark.update'), [
            'name'        => 'Geopark 1 name',
            'description' => 'Geopark 1 description',
        ]);

        $this->seeRouteIs('geoparks.index', ['q' => '123']);

        $this->seeInDatabase('geoparks', [
            'name'        => 'Geopark 1 name',
            'description' => 'Geopark 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Geopark 1 name',
            'description' => 'Geopark 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_geopark_name_update_is_required()
    {
        $this->loginAsUser();
        $geopark = Geopark::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('geoparks.update', $geopark), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_geopark_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $geopark = Geopark::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('geoparks.update', $geopark), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_geopark_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $geopark = Geopark::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('geoparks.update', $geopark), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_geopark()
    {
        $this->loginAsUser();
        $geopark = Geopark::factory()->create();
        Geopark::factory()->create();

        $this->visitRoute('geoparks.index', ['action' => 'edit', 'id' => $geopark->id]);
        $this->click('del-geopark-'.$geopark->id);
        $this->seeRouteIs('geoparks.index', ['action' => 'delete', 'id' => $geopark->id]);

        $this->seeInDatabase('geoparks', [
            'id' => $geopark->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('geoparks', [
            'id' => $geopark->id,
        ]);
    }
}
