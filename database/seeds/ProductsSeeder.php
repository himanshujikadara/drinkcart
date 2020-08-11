<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => 'Monster Ultra Sunrise',
            'description' => 'A refreshing orange beverage that has 75mg of caffeine per serving. Every can has two servings.',
            'photo' => 'https://www.pngkit.com/png/full/243-2439290_monster-energy-ultra-sunrise-monster-energy.png',
            'caffine' => 75
        ]);
        
        DB::table('products')->insert([
            'name' => 'Black Coffee',
            'description' => 'The classic, the average 8oz. serving of black coffee has 95mg of caffeine.',
            'photo' => 'https://www.kahlua.com//globalassets/images/cocktails/2018/opt/kahluadrinks_wide_coffee1.png',
            'caffine' => 95
        ]);
        
        DB::table('products')->insert([
            'name' => 'Americano',
            'description' => 'Sometimes you need to water it down a bit... and in comes the americano with an average of 77mg. of caffeine per serving.',
            'photo' => 'https://www.mcdonalds.com//is/image/content/dam/usa/nfl/nutrition/items/hero/desktop/t-mcdonalds-americano.jpg',
            'caffine' => 77
        ]);
        
        DB::table('products')->insert([
            'name' => 'Sugar free NOS',
            'description' => 'Another orange delight without the sugar. It has 130 mg. per serving and each can has two servings.',
            'photo' => 'https://images.heb.com/is/image/HEBGrocery/002053121',
            'caffine' => 130
        ]);
        
        DB::table('products')->insert([
            'name' => '5 Hour Energy',
            'description' => 'And amazing shot of get up and go! Each 2 fl. oz. container has 200mg of caffeine to get you going.',
            'photo' => 'https://images.heb.com/is/image/HEBGrocery/001137118',
            'caffine' => 200
        ]);
    }
}
