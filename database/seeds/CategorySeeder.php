<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS=0');
//        DB::table('Categories')->truncate();
        factory(App\Category::class)->create(['name' => 'stationary']);
        factory(App\Category::class)->create(['name' => 'hand_made']);
        factory(App\Category::class)->create(['name' => 'clothes']);
        factory(App\Category::class)->create(['name' => 'electrical_appliances']);
    }
}
