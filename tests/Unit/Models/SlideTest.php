<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Slide;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class SlideTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_slide_has_name_link_attribute()
    {
        $slide = Slide::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $slide->name, 'type' => __('slide.slide'),
        ]);
        $link = '<a href="'.route('slides.show', $slide).'"';
        $link .= ' title="'.$title.'">';
        $link .= $slide->name;
        $link .= '</a>';

        $this->assertEquals($link, $slide->name_link);
    }

    /** @test */
    public function a_slide_has_belongs_to_creator_relation()
    {
        $slide = Slide::factory()->make();

        $this->assertInstanceOf(User::class, $slide->creator);
        $this->assertEquals($slide->creator_id, $slide->creator->id);
    }
}
