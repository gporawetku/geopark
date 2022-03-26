<?php

namespace Tests\Feature;

use App\Models\Slide;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageSlideTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_slide_list_in_slide_index_page()
    {
        $slide = Slide::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('slides.index');
        $this->see($slide->name);
    }

    /** @test */
    public function user_can_create_a_slide()
    {
        $this->loginAsUser();
        $this->visitRoute('slides.index');

        $this->click(__('slide.create'));
        $this->seeRouteIs('slides.index', ['action' => 'create']);

        $this->submitForm(__('slide.create'), [
            'name'        => 'Slide 1 name',
            'description' => 'Slide 1 description',
        ]);

        $this->seeRouteIs('slides.index');

        $this->seeInDatabase('slides', [
            'name'        => 'Slide 1 name',
            'description' => 'Slide 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Slide 1 name',
            'description' => 'Slide 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_slide_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('slides.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_slide_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('slides.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_slide_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('slides.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_slide_within_search_query()
    {
        $this->loginAsUser();
        $slide = Slide::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('slides.index', ['q' => '123']);
        $this->click('edit-slide-'.$slide->id);
        $this->seeRouteIs('slides.index', ['action' => 'edit', 'id' => $slide->id, 'q' => '123']);

        $this->submitForm(__('slide.update'), [
            'name'        => 'Slide 1 name',
            'description' => 'Slide 1 description',
        ]);

        $this->seeRouteIs('slides.index', ['q' => '123']);

        $this->seeInDatabase('slides', [
            'name'        => 'Slide 1 name',
            'description' => 'Slide 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Slide 1 name',
            'description' => 'Slide 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_slide_name_update_is_required()
    {
        $this->loginAsUser();
        $slide = Slide::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('slides.update', $slide), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_slide_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $slide = Slide::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('slides.update', $slide), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_slide_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $slide = Slide::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('slides.update', $slide), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_slide()
    {
        $this->loginAsUser();
        $slide = Slide::factory()->create();
        Slide::factory()->create();

        $this->visitRoute('slides.index', ['action' => 'edit', 'id' => $slide->id]);
        $this->click('del-slide-'.$slide->id);
        $this->seeRouteIs('slides.index', ['action' => 'delete', 'id' => $slide->id]);

        $this->seeInDatabase('slides', [
            'id' => $slide->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('slides', [
            'id' => $slide->id,
        ]);
    }
}
