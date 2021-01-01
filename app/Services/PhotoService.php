<?php
/*
 * Copyright (c) 2021. Данный файл является интелектуальной собственостью Fulliton.
 * Я буду рад если вы будите вносить улучшения, всегда жду ваших пул реквестов
 */

namespace App\Services;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\Integer;


class PhotoService
{

  /**
   * @param $image
   * @param string $path
   * @param bool $cube
   * @param int $quality
   * @param int|null $width
   * @param int|null $height
   * @return string
   */
  public static function create ($image , string $path, bool $cube, int $quality, int $width = null, int $height = null): string
  {
    $file = $image->getClientOriginalName();
    $destinationPath = public_path($path);
    $name = pathinfo($file, PATHINFO_FILENAME) . '.png';
    $img = Image::make($image->getRealPath())->encode('png', $quality);
    if ($cube) {
      $img->fit($width, $width, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      });
    } else {
      $img->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      });
    }
    $img->save($destinationPath.'/'.$name);
    return $name;
  }

}
