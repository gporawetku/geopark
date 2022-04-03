<?php

namespace Tests\Feature;

use App\Models\Banner;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageBannerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_banner_list_in_banner_index_page()
    {
        $banner = Banner::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('banners.index');
        $this->see($banner->name);
    }

    /** @test */
    public function user_can_create_a_banner()
    {
        $this->loginAsUser();
        $this->visitRoute('banners.index');

        $this->click(__('banner.create'));
        $this->seeRouteIs('banners.index', ['action' => 'create']);

        $this->submitForm(__('banner.create'), [
            'name'        => 'Banner 1 name',
            'description' => 'Banner 1 description',
        ]);

        $this->seeRouteIs('banners.index');

        $this->seeInDatabase('banners', [
            'name'        => 'Banner 1 name',
            'description' => 'Banner 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Banner 1 name',
            'description' => 'Banner 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_banner_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('banners.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_banner_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('banners.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_banner_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('banners.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_banner_within_search_query()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('banners.index', ['q' => '123']);
        $this->click('edit-banner-'.$banner->id);
        $this->seeRouteIs('banners.index', ['action' => 'edit', 'id' => $banner->id, 'q' => '123']);

        $this->submitForm(__('banner.update'), [
            'name'        => 'Banner 1 name',
            'description' => 'Banner 1 description',
        ]);

        $this->seeRouteIs('banners.index', ['q' => '123']);

        $this->seeInDatabase('banners', [
            'name'        => 'Banner 1 name',
            'description' => 'Banner 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Banner 1 name',
            'description' => 'Banner 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_banner_name_update_is_required()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('banners.update', $banner), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_banner_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('banners.update', $banner), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_banner_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('banners.update', $banner), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_banner()
    {
        $this->loginAsUser();
        $banner = Banner::factory()->create();
        Banner::factory()->create();

        $this->visitRoute('banners.index', ['action' => 'edit', 'id' => $banner->id]);
        $this->click('del-banner-'.$banner->id);
        $this->seeRouteIs('banners.index', ['action' => 'delete', 'id' => $banner->id]);

        $this->seeInDatabase('banners', [
            'id' => $banner->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('banners', [
            'id' => $banner->id,
        ]);
    }
}
