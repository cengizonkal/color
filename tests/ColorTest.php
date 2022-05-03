<?php


use Conkal\Color\Color;
use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    public function test_it_should_create_from_hex()
    {
        $color = Color::fromHex('#ff0000');

        $this->assertEquals(255, $color->red());
        $this->assertEquals(0, $color->green());
        $this->assertEquals(0, $color->blue());
    }

    public function test_it_should_create_from_rgb()
    {
        $color = Color::fromRgb(255, 0, 0);

        $this->assertEquals(255, $color->red());
        $this->assertEquals(0, $color->green());
        $this->assertEquals(0, $color->blue());
    }

    public function test_it_should_lighten()
    {
        $color = Color::fromHex('#020000');

        $this->assertEquals(3, $color->lighten(50)->red());
    }

    public function test_it_should_darken()
    {
        $color = Color::fromHex('#ff0000');
        $this->assertEquals(127.5, $color->darken(50)->red());
    }
}
