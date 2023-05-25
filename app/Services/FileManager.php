<?php

namespace App\Services;
use Intervention\Image\Facades\Image;

class FileManager {

    public static function upload($img, $dir, $slug, $format = "png"): string
    {
        $image = Image::make($img)->encode($format, 100);

        $fileName = $slug . '.' . $format;

        $path = $dir . $fileName;

        $image->save($path);

        return '/' . $path;
    }


    public static function resize($img, $dir, $path, $slug): string
    {
        // Resize image
        $image = Image::make($img)->resize(300, 300)->encode('webp', 100);

        $tn = $slug.'.webp';

        $image->save($dir.$tn);

        return $path.$tn;
    }
}
