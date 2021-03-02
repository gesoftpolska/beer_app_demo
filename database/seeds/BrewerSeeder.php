<?php

use Illuminate\Database\Seeder;

class BrewerSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brewerNames = [
            '10 Barrel Brewing',
            'Ballast Point Brewing',
            'Birra Del Borgo ',
            'Blue Moon Brewing',
            'Blue Point Brewing',
            'Meantime Brewing '
        ];



        foreach ($brewerNames as $bName){
            $brewer = new \App\Brewer();
            $brewer->name = $bName;
            $brewer->save();

        }
    }
}
