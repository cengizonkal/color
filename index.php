<?php

require_once 'vendor/autoload.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo</title>
</head>
<body>
<?php
$color = \Conkal\Color\Color::fromHex('#990000'); ?>
<div style="float:left;background-color:<?php
echo $color; ?> ;width: 100px;height: 100px">
    <?php
    echo $color; ?>
</div>

<div style="float:left;background-color:<?php
echo $color->darken(); ?> ;width: 100px;height: 100px">
    <?php
    echo $color->darken(); ?>
</div>

<div style="float:left;background-color:<?php
echo $color->darken()->darken(); ?> ;width: 100px;height: 100px">
    <?php
    echo $color->darken()->darken(); ?>
</div>

<div style="float:left;background-color:<?php
echo $color->darken(50); ?> ;width: 100px;height: 100px">
    <?php
    echo $color->darken(50); ?>
</div>

<?php
foreach ($color->shades(3) as $key => $color) { ?>

    <div style="float:left;background-color:<?php
    echo $color; ?> ;width: 100px;height: 100px">
        <?php
        echo $key . '=>' . $color; ?>
    </div>


<?php
} ?>

<div style="float:left;background-color:<?php
echo \Conkal\Color\Color::fromHex('#ff0000')->invert(); ?> ;width: 100px;height: 100px">
    <?php
    echo \Conkal\Color\Color::fromHex('#ff0000')->invert(); ?>
</div>

</body>
</html>

