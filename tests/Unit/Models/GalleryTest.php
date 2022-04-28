<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class GalleryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_gallery_has_name_link_attribute()
    {
        $gallery = Gallery::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $gallery->name, 'type' => __('gallery.gallery'),
        ]);
        $link = '<a href="'.route('galleries.show', $gallery).'"';
        $link .= ' title="'.$title.'">';
        $link .= $gallery->name;
        $link .= '</a>';

        $this->assertEquals($link, $gallery->name_link);
    }

    /** @test */
    public function a_gallery_has_belongs_to_creator_relation()
    {
        $gallery = Gallery::factory()->make();

        $this->assertInstanceOf(User::class, $gallery->creator);
        $this->assertEquals($gallery->creator_id, $gallery->creator->id);
    }
}
