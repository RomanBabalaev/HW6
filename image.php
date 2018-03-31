<?php
require_once 'ImageTransform.php';

$img = new ImageTransform('bu_ob.jpg');

//поворячиваем
$img->rotate(50, 'buket_rotated .jpg');

//наносим ватермарк
$img->setWatermark('buket.PNG', 0.75, 'center', 'buker_WM.jpg');

//смена размерности
$img->resizeProport(250,'buket_resized.jpg');



