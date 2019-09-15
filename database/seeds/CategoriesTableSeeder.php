<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Dresses',
                'description' => 'The The Dress Shop event is over, but there is still more to discover.',
            ],
            [
                'title' => 'Jewelry',
                'description' => 'The Fashion Week | Your fashion, your style event is over, but there is still more to discover.',
            ],
            [
                'title' => 'Sunglasses',
                'description' => 'The Sunglasses with Free Shipping event is over, but there is still more to discover.',
            ],
        ]);
    }
}
