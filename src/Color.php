<?php

namespace Conkal\Color;

class Color
{
    private $red;
    private $green;
    private $blue;

    public function __construct($red, $green, $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    /**
     * Create a new color from a hexadecimal string
     * @param string $hexString The hexadecimal string #RRGGBB
     * @return Color
     */
    public static function fromHex($hexString)
    {
        $red = hexdec(substr($hexString, 1, 2));
        $green = hexdec(substr($hexString, 3, 2));
        $blue = hexdec(substr($hexString, 5, 2));
        return new self($red, $green, $blue);
    }

    /**
     * Creates a new color from rgb values
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return Color
     */
    public static function fromRgb($red, $green, $blue)
    {
        return new self($red, $green, $blue);
    }
    /**
     * Darken the color by a given percentage
     * @param int $percent
     * @return Color
     */
    public function darken($percent = 10)
    {
        $red = $this->red * (100 - $percent) / 100;
        $green = $this->green * (100 - $percent) / 100;
        $blue = $this->blue * (100 - $percent) / 100;
        return new self($red, $green, $blue);
    }

    /**
     * Lightens the color by a given percentage
     * @param int $percent
     * @return Color
     */
    public function lighten($percent = 10)
    {
        $red = min($this->red * (100 + $percent) / 100, 255);
        $green = min($this->green * (100 + $percent) / 100, 255);
        $blue = min($this->blue * (100 + $percent) / 100, 255);

        return new self($red, $green, $blue);
    }

    /**
     * Returns the hexadecimal string representation of the color
     * @return string
     */
    public function __toString()
    {
        return $this->hex();
    }

    /**
     * Returns a shades of current color
     * 0 index is the base color, +range is lighter, -range is darker
     * @param int $range
     * @return Color[]
     */
    public function shades($range)
    {
        $step = 100 / $range;
        $gradient = [];
        $gradient[0] = $this;
        for ($i = 1; $i <= $range; $i++) {
            $gradient[$i] = $this->lighten($step * $i);
        }
        for ($i = 1; $i <= $range; $i++) {
            $gradient[($i * -1)] = $this->darken($step * $i);
        }
        return $gradient;
    }

    public function hex()
    {
        return sprintf('#%02x%02x%02x', $this->red, $this->green, $this->blue);
    }

    public function invert()
    {
        return new self(255 - $this->red, 255 - $this->green, 255 - $this->blue);
    }

    public function __get($name)
    {
        if (isset($this->{$name})) {
            return $this->{$name};
        } else {
            $trace = debug_backtrace();
            trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE
            );
            return null;
        }
    }

}