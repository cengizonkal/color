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

    public static function fromHex($string)
    {
        $red = hexdec(substr($string, 1, 2));
        $green = hexdec(substr($string, 3, 2));
        $blue = hexdec(substr($string, 5, 2));
        return new self($red, $green, $blue);
    }

    public static function fromRgb($red, $green, $blue)
    {
        return new self($red, $green, $blue);
    }

    public function red()
    {
        return $this->_red;
    }

    public function green()
    {
        return $this->_green;
    }

    public function blue()
    {
        return $this->_blue;
    }

    public function darken($percent = 10)
    {
        $red = $this->_red * (100 - $percent) / 100;
        $green = $this->_green * (100 - $percent) / 100;
        $blue = $this->_blue * (100 - $percent) / 100;
        return new self($red, $green, $blue);
    }

    public function lighten($percent = 10)
    {
        $red = min($this->_red * (100 + $percent) / 100, 255);
        $green = min($this->_green * (100 + $percent) / 100, 255);
        $blue = min($this->_blue * (100 + $percent) / 100, 255);

        return new self($red, $green, $blue);
    }

    public function __toString()
    {
        return $this->hex();
    }

    public function gradient($range)
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