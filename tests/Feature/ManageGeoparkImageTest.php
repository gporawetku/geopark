<?php

namespace Tests\Feature;

use App\Models\GeoparkImage;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageGeoparkImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_geopark_image_list_in_geopark_image_index_page()
    {
        $geoparkImage = GeoparkImage::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('geopark_images.index');
        $this->see($geoparkImage->name);
    }

    /** @test */
    public function user_can_create_a_geopark_image()
    {
        $this->loginAsUser();
        $this->visitRoute('geopark_images.index');

        $this->click(__('geopark_image.create'));
        $this->seeRouteIs('geopark_images.index', ['action' => 'create']);

        $this->submitForm(__('geopark_image.create'), [
            'name'        => 'GeoparkImage 1 name',
            'description' => 'GeoparkImage 1 description',
        ]);

        $this->seeRouteIs('geopark_images.index');

        $this->seeInDatabase('geopark_images', [
            'name'        => 'GeoparkImage 1 name',
            'description' => 'GeoparkImage 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'GeoparkImage 1 name',
            'description' => 'GeoparkImage 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_geopark_image_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('geopark_images.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_geopark_image_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('geopark_images.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_geopark_image_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('geopark_images.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_geopark_image_within_search_query()
    {
        $this->loginAsUser();
        $geoparkImage = GeoparkImage::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('geopark_images.index', ['q' => '123']);
        $this->click('edit-geopark_image-'.$geoparkImage->id);
        $this->seeRouteIs('geopark_images.index', ['action' => 'edit', 'id' => $geoparkImage->id, 'q' => '123']);

        $this->submitForm(__('geopark_image.update'), [
            'name'        => 'GeoparkImage 1 name',
            'description' => 'GeoparkImage 1 description',
        ]);

        $this->seeRouteIs('geopark_images.index', ['q' => '123']);

        $this->seeInDatabase('geopark_images', [
            'name'        => 'GeoparkImage 1 name',
            'description' => 'GeoparkImage 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'GeoparkImage 1 name',
            'description' => 'GeoparkImage 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_geopark_image_name_update_is_required()
    {
        $this->loginAsUser();
        $geopark_image = GeoparkImage::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('geopark_images.update', $geopark_image), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_geopark_image_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $geopark_image = GeoparkImage::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('geopark_images.update', $geopark_image), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_geopark_image_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $geopark_image = GeoparkImage::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('geopark_images.update', $geopark_image), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_geopark_image()
    {
        $this->loginAsUser();
        $geoparkImage = GeoparkImage::factory()->create();
        GeoparkImage::factory()->create();

        $this->visitRoute('geopark_images.index', ['action' => 'edit', 'id' => $geoparkImage->id]);
        $this->click('del-geopark_image-'.$geoparkImage->id);
        $this->seeRouteIs('geopark_images.index', ['action' => 'delete', 'id' => $geoparkImage->id]);

        $this->seeInDatabase('geopark_images', [
            'id' => $geoparkImage->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('geopark_images', [
            'id' => $geoparkImage->id,
        ]);
    }
}
