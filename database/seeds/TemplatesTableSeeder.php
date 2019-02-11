<?php

use App\Template;
use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 8) as $index) {
            Template::query()->create([
                'name' => "Template {$index}",
                'slug' => "v{$index}",
                'preview_img' => "https://cdn.colorlib.com/wp/wp-content/uploads/sites/2/under-construction-{$index}.jpg",
                'download_path' => 'templates-view/comingsoon_v1-v8.zip'
            ]);
        }
    }
}
