<?php
require "vendor/autoload.php";

use Intervention\Image\ImageManagerStatic as Image;

class ImageTransform
{
    private $img;

    /**
     * @return mixed
     */
    public function __construct($file)
    {
        $this->img = Image::make($file);
    }

    public function rotate($degree, $newImage)
    {
        $tmpImg = clone $this->img;
        $tmpImg->rotate($degree);
        $tmpImg->save($newImage);
        unset($tmpImg);
    }

    public function setWatermark($wFilename, $wSize, $wPosition, $newImage)
    {
        $watermark = Image::make($wFilename);
        $watermark->resize(round($wSize * $this->img->width()), null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $tmpImg = clone $this->img;
        $tmpImg->insept($watermark, 'center');
        $tmpImg->save($newImage);
        unset($tmpImg);
    }

    public function resizeProport($newWidth, $newImage)
    {
        $tmpImg = clone $this->img;
        $tmpImg->resize($newWidth, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $tmpImg->save($newImage);
        unset($tmpImg);
    }
}