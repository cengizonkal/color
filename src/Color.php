<?php

namespace Conkal\Color;

class Color
{
    protected $_red;
    protected $_green;
    protected $_blue;

    public function __construct($red, $green, $blue)
    {
        $this->_red = $red;
        $this->_green = $green;
        $this->_blue = $blue;
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
     * Returns the red decimal value of the color.
     * @return mixed
     */
    public function red()
    {
        return $this->_red;
    }

    /**
     * Returns the green decimal value of the color.
     * @return mixed
     */
    public function green()
    {
        return $this->_green;
    }

    /**
     * Returns the blue decimal value of the color.
     * @return mixed
     */
    public function blue()
    {
        return $this->_blue;
    }

    /**
     * Darken the color by a given percentage
     * @param int $percent
     * @return Color
     */
    public function darken($percent = 10)
    {
        $red = $this->_red * (100 - $percent) / 100;
        $green = $this->_green * (100 - $percent) / 100;
        $blue = $this->_blue * (100 - $percent) / 100;
        return new self($red, $green, $blue);
    }

    /**
     * Lightens the color by a given percentage
     * @param int $percent
     * @return Color
     */
    public function lighten($percent = 10)
    {
        $red = min($this->_red * (100 + $percent) / 100, 255);
        $green = min($this->_green * (100 + $percent) / 100, 255);
        $blue = min($this->_blue * (100 + $percent) / 100, 255);

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
        return sprintf('#%02x%02x%02x', $this->_red, $this->_green, $this->_blue);
    }

    public function invert()
    {
        return new self(255 - $this->_red, 255 - $this->_green, 255 - $this->_blue);
    }

}