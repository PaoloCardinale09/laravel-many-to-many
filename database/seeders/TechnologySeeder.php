<?php

namespace Database\Seeders;

use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $labels = ['HTML 5', 'SCSS', 'CSS', 'Php', 'Bootstrap 5', 'Tailwind', 'Javascript'];
        
        foreach($labels as $label){
            $type = new Technology();
            $type->label = $label;
            
            $type->save();

        }
    }
}