<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path('database/data/questions.csv'), 'r');
        $firstline = true;
        while(($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if(!$firstline) {
                Question::create([
                    'language_id' => $data[0],
                    'description' => $data[1]
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
