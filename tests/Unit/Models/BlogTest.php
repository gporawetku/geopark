<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_blog_has_name_link_attribute()
    {
        $blog = Blog::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $blog->name, 'type' => __('blog.blog'),
        ]);
        $link = '<a href="'.route('blogs.show', $blog).'"';
        $link .= ' title="'.$title.'">';
        $link .= $blog->name;
        $link .= '</a>';

        $this->assertEquals($link, $blog->name_link);
    }

    /** @test */
    public function a_blog_has_belongs_to_creator_relation()
    {
        $blog = Blog::factory()->make();

        $this->assertInstanceOf(User::class, $blog->creator);
        $this->assertEquals($blog->creator_id, $blog->creator->id);
    }
}
