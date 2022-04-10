<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Geopark;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class GeoparkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_geopark_has_name_link_attribute()
    {
        $geopark = Geopark::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $geopark->name, 'type' => __('geopark.geopark'),
        ]);
        $link = '<a href="'.route('geoparks.show', $geopark).'"';
        $link .= ' title="'.$title.'">';
        $link .= $geopark->name;
        $link .= '</a>';

        $this->assertEquals($link, $geopark->name_link);
    }

    /** @test */
    public function a_geopark_has_belongs_to_creator_relation()
    {
        $geopark = Geopark::factory()->make();

        $this->assertInstanceOf(User::class, $geopark->creator);
        $this->assertEquals($geopark->creator_id, $geopark->creator->id);
    }
}
