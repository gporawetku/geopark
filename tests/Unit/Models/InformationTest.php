<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Information;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class InformationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_information_has_name_link_attribute()
    {
        $information = Information::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $information->name, 'type' => __('information.information'),
        ]);
        $link = '<a href="'.route('information.show', $information).'"';
        $link .= ' title="'.$title.'">';
        $link .= $information->name;
        $link .= '</a>';

        $this->assertEquals($link, $information->name_link);
    }

    /** @test */
    public function a_information_has_belongs_to_creator_relation()
    {
        $information = Information::factory()->make();

        $this->assertInstanceOf(User::class, $information->creator);
        $this->assertEquals($information->creator_id, $information->creator->id);
    }
}
