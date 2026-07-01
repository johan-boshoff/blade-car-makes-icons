<?php

declare(strict_types=1);

namespace Tests;

use BladeUI\Icons\BladeIconsServiceProvider;
use JohanBoshoff\CarMakesIcons\BladeCarMakesIconsServiceProvider;
use Orchestra\Testbench\TestCase;

class CompilesIconsTest extends TestCase
{
    public function test_it_compiles_a_single_anonymous_component()
    {
        $result = svg('carmakes-mitsubishi')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 80.4 80.4" xml:space="preserve" fill="currentColor"><g><polygon points="39.7,7.2 27,27.6 52.5,72.1 79.3,72 65.7,50 14.3,50 1.1,72.3 26.1,72.3 52.9,27.2 "/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    public function test_it_can_add_classes_to_icons()
    {
        $result = svg('carmakes-mitsubishi', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 80.4 80.4" xml:space="preserve" fill="currentColor"><g><polygon points="39.7,7.2 27,27.6 52.5,72.1 79.3,72 65.7,50 14.3,50 1.1,72.3 26.1,72.3 52.9,27.2 "/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    public function test_it_can_add_styles_to_icons()
    {
        $result = svg('carmakes-mitsubishi', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 80.4 80.4" xml:space="preserve" fill="currentColor"><g><polygon points="39.7,7.2 27,27.6 52.5,72.1 79.3,72 65.7,50 14.3,50 1.1,72.3 26.1,72.3 52.9,27.2 "/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    public function test_it_renders_icons_as_blade_components()
    {
        $this->blade('<x-carmakes-mitsubishi class="w-6 h-6" />')
            ->assertSeeHtml('<svg class="w-6 h-6"')
            ->assertSeeHtml('viewBox="0 0 80.4 80.4"')
            ->assertSeeHtml('fill="currentColor"');
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeCarMakesIconsServiceProvider::class,
        ];
    }
}
