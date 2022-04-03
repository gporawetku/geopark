<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Banner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class BannerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_banner_has_name_link_attribute()
    {
        $banner = Banner::factory()->create();

        $title = __('app.show_detail_title', [
            'name' => $banner->name, 'type' => __('banner.banner'),
        ]);
        $link = '<a href="'.route('banners.show', $banner).'"';
        $link .= ' title="'.$title.'">';
        $link .= $banner->name;
        $link .= '</a>';

        $this->assertEquals($link, $banner->name_link);
    }

    /** @test */
    public function a_banner_has_belongs_to_creator_relation()
    {
        $banner = Banner::factory()->make();

        $this->assertInstanceOf(User::class, $banner->creator);
        $this->assertEquals($banner->creator_id, $banner->creator->id);
    }
}
