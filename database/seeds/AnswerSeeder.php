<?php

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(QuestionSeeder::class);
        factory(App\Answer::class, 21)->create();
    }
}
