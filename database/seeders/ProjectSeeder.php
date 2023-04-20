<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0; $i < 40; $i++){
            $project = new Project;
            $project->name = $faker->word();
            $project->description = $faker->paragraphs(2, true);
            $project->technology = $faker->word();
            $project->url = $faker->url();
            // $project->image = 'https://picsum.photos/400/300';

            $project->save();
        }
    }
}