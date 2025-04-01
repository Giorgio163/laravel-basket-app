<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Register the helper function
        if (!function_exists('getRandomImageFromCatalogue')) {
            function getRandomImageFromCatalogue()
            {
                $imageFiles = File::files(public_path('images/catalogue'));

                if (count($imageFiles) > 0) {
                    $randomImage = $imageFiles[array_rand($imageFiles)];
                    return basename($randomImage);
                }

                return 'default-image.jpg';
            }
        }
    }
}
