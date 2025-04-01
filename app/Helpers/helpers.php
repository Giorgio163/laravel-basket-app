<?php

use Illuminate\Support\Facades\File;

if (!function_exists('getRandomImageFromCatalogue')) {
    function getRandomImageFromCatalogue()
    {
        // Get all files from the images/catalogue directory
        $imageFiles = File::files(public_path('images/catalogue'));

        if (count($imageFiles) > 0) {
            // Pick a random image file
            $randomImage = $imageFiles[array_rand($imageFiles)];
            return basename($randomImage);  // Return the file name
        }

        return 'default-image.jpg'; // Return a default image if no images are found
    }
}
