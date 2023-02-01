<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // to seed file storage
        $images = Storage::allFiles('images');

        foreach ($images as $image) {
            Image::factory()->create([
                'file' => $image,
                'dimension' => Image::getDimension($image)
            ]);

        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    // protected function getDimension($image)
    // {
    //     // return array
    //     [$width, $height] = getimagesize(Storage::path($image));

    //     return $width . "x" . $height;
    // }
}
