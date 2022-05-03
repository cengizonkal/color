![Build](https://github.com/cengizonkal/color/workflows/Build/badge.svg)

# Color  
## Installation
```
composer require conkal/color
```
### fromHex
```php
$color = Color::fromHex('#990000');
```
<div style="background-color: #990000; width: 100px; height: 100px;"></div>

### lighten
```php
// lighten by 10%
$color = Color::fromHex('#990000')->lighten(30);
```
<div style="background-color: #c60000; width: 100px; height: 100px;"></div>

### darken
```php
// darken by 10%
$color = Color::fromHex('#990000')->darken(30);
```
<div style="background-color: #6b0000; width: 100px; height: 100px;"></div>

### shades
gives an array of colors
```php
$colors = Color::fromHex('#990000')->shades(3);
```
<div style="float:left;background-color:#990000 ;width: 100px;height: 100px">
        0=>#990000    </div>
<div style="float:left;background-color:#cc0000 ;width: 100px;height: 100px">
        1=>#cc0000    </div>
<div style="float:left;background-color:#ff0000 ;width: 100px;height: 100px">
        2=>#ff0000    </div>
<div style="float:left;background-color:#ff0000 ;width: 100px;height: 100px">
        3=>#ff0000    </div>
<div style="float:left;background-color:#650000 ;width: 100px;height: 100px">-1=>#650000</div>
<div style="float:left;background-color:#320000 ;width: 100px;height: 100px">-2=>#320000</div>
<div style="float:left;background-color:#000000;width:100px;height: 100px">-3=>#000000</div>
<div style="clear: both;"></div>


### invert
```php
$color = Color::fromHex('#ff0000')->invert();
```
<div style="background-color: #00ffff; width: 100px; height: 100px;"></div>