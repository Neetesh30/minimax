<?php

namespace Tests\Feature;

use App\Filament\Resources\Banners\BannerResource;
use App\Filament\Resources\HomeBanners\HomeBannerResource;
use App\Models\Banner;
use App\Livewire\ShowHome;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BannerSectionsTest extends TestCase
{
    public function test_home_and_page_banners_are_isolated_and_home_banners_can_be_ordered(): void
    {
        // Always use a disposable database, independently of the local .env.
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);

        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('route_name');
            $table->unsignedInteger('sort_order')->default(1);
            $table->timestamps();
        });

        $page = Banner::create(['route_name' => 'about', 'image' => 'about.jpg']);
        $second = Banner::create(['route_name' => 'home', 'image' => 'second.jpg', 'sort_order' => 2]);
        $first = Banner::create(['route_name' => 'home', 'image' => 'first.jpg', 'sort_order' => 1]);

        $this->assertSame([$page->id], BannerResource::getEloquentQuery()->pluck('id')->all());
        $this->assertSame(
            [$first->id, $second->id],
            HomeBannerResource::getEloquentQuery()->orderBy('sort_order')->pluck('id')->all(),
        );
        $this->assertNull(BannerResource::getEloquentQuery()->find($first->id));
        $this->assertNull(HomeBannerResource::getEloquentQuery()->find($page->id));
    }

    public function test_home_slider_skips_missing_files_and_returns_valid_images_in_sequence(): void
    {
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('route_name');
            $table->unsignedInteger('sort_order')->default(1);
            $table->timestamps();
        });
        Storage::fake('public');
        $component = new ShowHome;
        $this->assertTrue($component->render()->getData()['homeBanners']->isEmpty());

        Banner::create(['route_name' => 'home', 'image' => 'missing.jpg', 'sort_order' => 1]);
        $second = Banner::create(['route_name' => 'home', 'image' => 'second.jpg', 'sort_order' => 3]);
        $first = Banner::create(['route_name' => 'home', 'image' => 'first.jpg', 'sort_order' => 2]);
        Banner::create(['route_name' => 'about', 'image' => 'about.jpg']);
        foreach (['first.jpg', 'second.jpg', 'about.jpg'] as $image) {
            Storage::disk('public')->put($image, 'test image');
        }

        $this->assertSame(
            [$first->id, $second->id],
            $component->render()->getData()['homeBanners']->pluck('id')->all(),
        );
        Storage::disk('public')->delete(['first.jpg', 'second.jpg']);
        $this->assertTrue($component->render()->getData()['homeBanners']->isEmpty());
        $this->assertFileExists(public_path('front/images/Banner 1.jpg.jpeg'));
    }
}
