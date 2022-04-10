<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\GeoparkImage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class GeoparkImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_geopark_image_has_name_link_attribute()
    {
        $geoparkImage = GeoparkImage::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $geoparkImage->name, 'type' => __('geopark_image.geopark_image'),
        ]);
        $link = '<a href="'.route('geopark_images.show', $geoparkImage).'"';
        $link .= ' title="'.$title.'">';
        $link .= $geoparkImage->name;
        $link .= '</a>';

        $this->assertEquals($link, $geoparkImage->name_link);
    }

    /** @test */
    public function a_geopark_image_has_belongs_to_creator_relation()
    {
        $geoparkImage = GeoparkImage::factory()->make();

        $this->assertInstanceOf(User::class, $geoparkImage->creator);
        $this->assertEquals($geoparkImage->creator_id, $geoparkImage->creator->id);
    }
}
