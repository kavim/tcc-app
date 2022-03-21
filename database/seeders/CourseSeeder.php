<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use App\Models\CourseTranslation;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $courses = Course::factory(2)->create();

        $name1_pt = 'Análise e Desenvolvimento de Sistemas';
        $name1_es = 'Análisis y desarrollo de Sistemas';
        $course1 = Course::create();

        CourseTranslation::create([
            'locale' => 'pt',
            'name' => $name1_pt,
            'slug' => \Str::slug($name1_pt),
            'course_id' => $course1->id
        ]);

        CourseTranslation::create([
            'locale' => 'es',
            'name' => $name1_es,
            'slug' => \Str::slug($name1_es),
            'course_id' => $course1->id
        ]);


        $name2_pt = 'Mecatrônica Industrial';
        $name2_es = 'Mecatrónica Industrial';
        $course2 = Course::create();

        CourseTranslation::create([
            'locale' => 'pt',
            'name' => $name2_pt,
            'slug' => \Str::slug($name2_pt),
            'course_id' => $course2->id
        ]);
        CourseTranslation::create([
            'locale' => 'es',
            'name' => $name2_es,
            'slug' => \Str::slug($name2_es),
            'course_id' => $course2->id
        ]);
    }
}
