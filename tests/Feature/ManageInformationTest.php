<?php

namespace Tests\Feature;

use App\Models\Information;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageInformationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_information_list_in_information_index_page()
    {
        $information = Information::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('information.index');
        $this->see($information->name);
    }

    /** @test */
    public function user_can_create_a_information()
    {
        $this->loginAsUser();
        $this->visitRoute('information.index');

        $this->click(__('information.create'));
        $this->seeRouteIs('information.index', ['action' => 'create']);

        $this->submitForm(__('information.create'), [
            'name'        => 'Information 1 name',
            'description' => 'Information 1 description',
        ]);

        $this->seeRouteIs('information.index');

        $this->seeInDatabase('information', [
            'name'        => 'Information 1 name',
            'description' => 'Information 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Information 1 name',
            'description' => 'Information 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_information_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('information.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_information_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('information.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_information_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('information.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_information_within_search_query()
    {
        $this->loginAsUser();
        $information = Information::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('information.index', ['q' => '123']);
        $this->click('edit-information-'.$information->id);
        $this->seeRouteIs('information.index', ['action' => 'edit', 'id' => $information->id, 'q' => '123']);

        $this->submitForm(__('information.update'), [
            'name'        => 'Information 1 name',
            'description' => 'Information 1 description',
        ]);

        $this->seeRouteIs('information.index', ['q' => '123']);

        $this->seeInDatabase('information', [
            'name'        => 'Information 1 name',
            'description' => 'Information 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Information 1 name',
            'description' => 'Information 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_information_name_update_is_required()
    {
        $this->loginAsUser();
        $information = Information::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('information.update', $information), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_information_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $information = Information::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('information.update', $information), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_information_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $information = Information::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('information.update', $information), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_information()
    {
        $this->loginAsUser();
        $information = Information::factory()->create();
        Information::factory()->create();

        $this->visitRoute('information.index', ['action' => 'edit', 'id' => $information->id]);
        $this->click('del-information-'.$information->id);
        $this->seeRouteIs('information.index', ['action' => 'delete', 'id' => $information->id]);

        $this->seeInDatabase('information', [
            'id' => $information->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('information', [
            'id' => $information->id,
        ]);
    }
}
