<?php

namespace Tests\Feature;

use App\Models\Gallery;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageGalleryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_gallery_list_in_gallery_index_page()
    {
        $gallery = Gallery::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('galleries.index');
        $this->see($gallery->name);
    }

    /** @test */
    public function user_can_create_a_gallery()
    {
        $this->loginAsUser();
        $this->visitRoute('galleries.index');

        $this->click(__('gallery.create'));
        $this->seeRouteIs('galleries.index', ['action' => 'create']);

        $this->submitForm(__('gallery.create'), [
            'name'        => 'Gallery 1 name',
            'description' => 'Gallery 1 description',
        ]);

        $this->seeRouteIs('galleries.index');

        $this->seeInDatabase('galleries', [
            'name'        => 'Gallery 1 name',
            'description' => 'Gallery 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Gallery 1 name',
            'description' => 'Gallery 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_gallery_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('galleries.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_gallery_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('galleries.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_gallery_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('galleries.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_gallery_within_search_query()
    {
        $this->loginAsUser();
        $gallery = Gallery::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('galleries.index', ['q' => '123']);
        $this->click('edit-gallery-'.$gallery->id);
        $this->seeRouteIs('galleries.index', ['action' => 'edit', 'id' => $gallery->id, 'q' => '123']);

        $this->submitForm(__('gallery.update'), [
            'name'        => 'Gallery 1 name',
            'description' => 'Gallery 1 description',
        ]);

        $this->seeRouteIs('galleries.index', ['q' => '123']);

        $this->seeInDatabase('galleries', [
            'name'        => 'Gallery 1 name',
            'description' => 'Gallery 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Gallery 1 name',
            'description' => 'Gallery 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_gallery_name_update_is_required()
    {
        $this->loginAsUser();
        $gallery = Gallery::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('galleries.update', $gallery), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_gallery_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $gallery = Gallery::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('galleries.update', $gallery), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_gallery_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $gallery = Gallery::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('galleries.update', $gallery), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_gallery()
    {
        $this->loginAsUser();
        $gallery = Gallery::factory()->create();
        Gallery::factory()->create();

        $this->visitRoute('galleries.index', ['action' => 'edit', 'id' => $gallery->id]);
        $this->click('del-gallery-'.$gallery->id);
        $this->seeRouteIs('galleries.index', ['action' => 'delete', 'id' => $gallery->id]);

        $this->seeInDatabase('galleries', [
            'id' => $gallery->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('galleries', [
            'id' => $gallery->id,
        ]);
    }
}
