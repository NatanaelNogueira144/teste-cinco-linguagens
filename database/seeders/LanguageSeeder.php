<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/languages.csv'), 'r');
        $firstline = true;
        while(($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if(!$firstline) {
                Language::create([
                    'name' => $data[0],
                    'image' => $data[1]
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
