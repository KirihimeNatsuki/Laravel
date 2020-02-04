<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SkillsTableSeeder::class);
        $skills = App\Skill::all();
        factory(App\User::class, 50)->create()->each(function($u) use ($skills){
            $skillsSet = $skills->random(rand(1,4));
            foreach ($skillsSet as $skills){
                $u->skills()->attach($skills->id, ['level' => rand(1,5)]);
            }
        });
    }
}
