<?php

use Illuminate\Database\Seeder;

use App\Beer as Beer;

class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 2000; $i++) {
            $beer = new Beer();
            $beer->name = $faker->word(10);
            $beer->price_from = rand(1, 6);
            $beer->price_to = rand(7, 12);
            $beer->country_code = $faker->countryCode;
            $beer->type = "type 1";
            $beer->id_brewer = rand(1, 6);
            $beer->save();


        }
    }
}
