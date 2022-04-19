<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\AbstractPoster;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class AbstractPosterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_abstract_poster_has_title_link_attribute()
    {
        $abstractPoster = AbstractPoster::factory()->create();

        $title = __('app.show_detail_title', [
            'title' => $abstractPoster->title, 'type' => __('abstract_poster.abstract_poster'),
        ]);
        $link = '<a href="'.route('abstract_posters.show', $abstractPoster).'"';
        $link .= ' title="'.$title.'">';
        $link .= $abstractPoster->title;
        $link .= '</a>';

        $this->assertEquals($link, $abstractPoster->title_link);
    }

    /** @test */
    public function a_abstract_poster_has_belongs_to_creator_relation()
    {
        $abstractPoster = AbstractPoster::factory()->make();

        $this->assertInstanceOf(User::class, $abstractPoster->creator);
        $this->assertEquals($abstractPoster->creator_id, $abstractPoster->creator->id);
    }
}
