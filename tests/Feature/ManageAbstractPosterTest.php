<?php

namespace Tests\Feature;

use App\Models\AbstractPoster;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageAbstractPosterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_abstract_poster_list_in_abstract_poster_index_page()
    {
        $abstractPoster = AbstractPoster::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('abstract_posters.index');
        $this->see($abstractPoster->title);
    }

    /** @test */
    public function user_can_create_a_abstract_poster()
    {
        $this->loginAsUser();
        $this->visitRoute('abstract_posters.index');

        $this->click(__('abstract_poster.create'));
        $this->seeRouteIs('abstract_posters.index', ['action' => 'create']);

        $this->submitForm(__('app.create'), [
            'title'       => 'AbstractPoster 1 title',
            'description' => 'AbstractPoster 1 description',
        ]);

        $this->seeRouteIs('abstract_posters.index');

        $this->seeInDatabase('abstract_posters', [
            'title'       => 'AbstractPoster 1 title',
            'description' => 'AbstractPoster 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'AbstractPoster 1 title',
            'description' => 'AbstractPoster 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_abstract_poster_title_is_required()
    {
        $this->loginAsUser();

        // title empty
        $this->post(route('abstract_posters.store'), $this->getCreateFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_abstract_poster_title_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // title 70 characters
        $this->post(route('abstract_posters.store'), $this->getCreateFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_abstract_poster_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('abstract_posters.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_abstract_poster_within_search_query()
    {
        $this->loginAsUser();
        $abstractPoster = AbstractPoster::factory()->create(['title' => 'Testing 123']);

        $this->visitRoute('abstract_posters.index', ['q' => '123']);
        $this->click('edit-abstract_poster-'.$abstractPoster->id);
        $this->seeRouteIs('abstract_posters.index', ['action' => 'edit', 'id' => $abstractPoster->id, 'q' => '123']);

        $this->submitForm(__('abstract_poster.update'), [
            'title'       => 'AbstractPoster 1 title',
            'description' => 'AbstractPoster 1 description',
        ]);

        $this->seeRouteIs('abstract_posters.index', ['q' => '123']);

        $this->seeInDatabase('abstract_posters', [
            'title'       => 'AbstractPoster 1 title',
            'description' => 'AbstractPoster 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'title'       => 'AbstractPoster 1 title',
            'description' => 'AbstractPoster 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_abstract_poster_title_update_is_required()
    {
        $this->loginAsUser();
        $abstract_poster = AbstractPoster::factory()->create(['title' => 'Testing 123']);

        // title empty
        $this->patch(route('abstract_posters.update', $abstract_poster), $this->getEditFields(['title' => '']));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_abstract_poster_title_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $abstract_poster = AbstractPoster::factory()->create(['title' => 'Testing 123']);

        // title 70 characters
        $this->patch(route('abstract_posters.update', $abstract_poster), $this->getEditFields([
            'title' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('title');
    }

    /** @test */
    public function validate_abstract_poster_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $abstract_poster = AbstractPoster::factory()->create(['title' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('abstract_posters.update', $abstract_poster), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_abstract_poster()
    {
        $this->loginAsUser();
        $abstractPoster = AbstractPoster::factory()->create();
        AbstractPoster::factory()->create();

        $this->visitRoute('abstract_posters.index', ['action' => 'edit', 'id' => $abstractPoster->id]);
        $this->click('del-abstract_poster-'.$abstractPoster->id);
        $this->seeRouteIs('abstract_posters.index', ['action' => 'delete', 'id' => $abstractPoster->id]);

        $this->seeInDatabase('abstract_posters', [
            'id' => $abstractPoster->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('abstract_posters', [
            'id' => $abstractPoster->id,
        ]);
    }
}
