<?php

namespace Database\Seeders;

// use Dotenv\Store\File\Reader;
use League\Csv\Reader;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Category::factory()->count(10)->create();
        // \App\Models\Category::factory()->count(5)->active()->create();

        $csv = Reader::createFromPath(database_path('seeders/categories.csv'));
        $csv->setHeaderOffset(0);

foreach ($csv as $record) {
    Category::create([
        'name' => $record['name'],
        'description' => $record['description'],
    ]);
}
    }
}