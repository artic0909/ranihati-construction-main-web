<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('blogs:generate-slugs', function () {
    $blogs = \App\Models\Blog::whereNull('slug')->orWhere('slug', '')->get();

    $this->info("Found {$blogs->count()} blogs without slugs.");

    foreach ($blogs as $blog) {
        $blog->save(); // This will trigger the boot() method to generate slug
        $this->info("Generated slug for: {$blog->title} -> {$blog->slug}");
    }

    $this->info("All slugs generated successfully!");
})->purpose('Generate slugs for existing blogs');
