<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    // create directory for images by coding
    public static function makeDirectory()
    {
        # code...
        $subFolder = 'images/' . date('Y/m/d');
        Storage::makeDirectory($subFolder);

        return $subFolder;
    }
    
    public static function getDimension($image)
    {
        // return array
        [$width, $height] = getimagesize(Storage::path($image));

        return $width . "x" . $height;
    }

    public function scopePublished($query)
    {
        # $query represent eloquent builder instance

        // scope query only include published images
        return $query->where('is_published', true);
    }

    public function fileUrl()
    {
        return Storage::url($this->file);
    }
}
