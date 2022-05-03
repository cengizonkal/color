![Build](https://github.com/cengizonkal/color/workflows/Build/badge.svg)

# Color  
## Installation
```
composer require conkal/color
```
### fromHex
```php
$color = Color::fromHex('#ff0000');
```

### lighten
```php
// lighten by 10%
$color = Color::fromHex('#ff0000')->lighten(10);
```

### darken
```php
// darken by 10%
$color = Color::fromHex('#ff0000')->darken(10);
```
### gradient
gives an array of colors
```php
$colors = Color::fromHex('#ff0000')->shades(3);
```

### invert
```php
$color = Color::fromHex('#ff0000')->invert();
```