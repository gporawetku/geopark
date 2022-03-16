<?php

namespace Tests\Feature;

use App\Models\Blog;
use Tests\BrowserKitTest as TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageBlogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_blog_list_in_blog_index_page()
    {
        $blog = Blog::factory()->create();

        $this->loginAsUser();
        $this->visitRoute('blogs.index');
        $this->see($blog->name);
    }

    /** @test */
    public function user_can_create_a_blog()
    {
        $this->loginAsUser();
        $this->visitRoute('blogs.index');

        $this->click(__('blog.create'));
        $this->seeRouteIs('blogs.index', ['action' => 'create']);

        $this->submitForm(__('blog.create'), [
            'name'        => 'Blog 1 name',
            'description' => 'Blog 1 description',
        ]);

        $this->seeRouteIs('blogs.index');

        $this->seeInDatabase('blogs', [
            'name'        => 'Blog 1 name',
            'description' => 'Blog 1 description',
        ]);
    }

    private function getCreateFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Blog 1 name',
            'description' => 'Blog 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_blog_name_is_required()
    {
        $this->loginAsUser();

        // name empty
        $this->post(route('blogs.store'), $this->getCreateFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_blog_name_is_not_more_than_60_characters()
    {
        $this->loginAsUser();

        // name 70 characters
        $this->post(route('blogs.store'), $this->getCreateFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_blog_description_is_not_more_than_255_characters()
    {
        $this->loginAsUser();

        // description 256 characters
        $this->post(route('blogs.store'), $this->getCreateFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_a_blog_within_search_query()
    {
        $this->loginAsUser();
        $blog = Blog::factory()->create(['name' => 'Testing 123']);

        $this->visitRoute('blogs.index', ['q' => '123']);
        $this->click('edit-blog-'.$blog->id);
        $this->seeRouteIs('blogs.index', ['action' => 'edit', 'id' => $blog->id, 'q' => '123']);

        $this->submitForm(__('blog.update'), [
            'name'        => 'Blog 1 name',
            'description' => 'Blog 1 description',
        ]);

        $this->seeRouteIs('blogs.index', ['q' => '123']);

        $this->seeInDatabase('blogs', [
            'name'        => 'Blog 1 name',
            'description' => 'Blog 1 description',
        ]);
    }

    private function getEditFields(array $overrides = [])
    {
        return array_merge([
            'name'        => 'Blog 1 name',
            'description' => 'Blog 1 description',
        ], $overrides);
    }

    /** @test */
    public function validate_blog_name_update_is_required()
    {
        $this->loginAsUser();
        $blog = Blog::factory()->create(['name' => 'Testing 123']);

        // name empty
        $this->patch(route('blogs.update', $blog), $this->getEditFields(['name' => '']));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_blog_name_update_is_not_more_than_60_characters()
    {
        $this->loginAsUser();
        $blog = Blog::factory()->create(['name' => 'Testing 123']);

        // name 70 characters
        $this->patch(route('blogs.update', $blog), $this->getEditFields([
            'name' => str_repeat('Test Title', 7),
        ]));
        $this->assertSessionHasErrors('name');
    }

    /** @test */
    public function validate_blog_description_update_is_not_more_than_255_characters()
    {
        $this->loginAsUser();
        $blog = Blog::factory()->create(['name' => 'Testing 123']);

        // description 256 characters
        $this->patch(route('blogs.update', $blog), $this->getEditFields([
            'description' => str_repeat('Long description', 16),
        ]));
        $this->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_delete_a_blog()
    {
        $this->loginAsUser();
        $blog = Blog::factory()->create();
        Blog::factory()->create();

        $this->visitRoute('blogs.index', ['action' => 'edit', 'id' => $blog->id]);
        $this->click('del-blog-'.$blog->id);
        $this->seeRouteIs('blogs.index', ['action' => 'delete', 'id' => $blog->id]);

        $this->seeInDatabase('blogs', [
            'id' => $blog->id,
        ]);

        $this->press(__('app.delete_confirm_button'));

        $this->dontSeeInDatabase('blogs', [
            'id' => $blog->id,
        ]);
    }
}
