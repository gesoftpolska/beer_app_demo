<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->integer('id_brewer')->unsigned();
            $table->timestamps();
            $table->string('name', 20);
            $table->float('price_from');
            $table->float('price_to');
            $table->string('country_code', 2);
            $table->string('type', 10);
        });

        DB::statement('ALTER TABLE beers ADD KEY byName(name)');
        DB::statement('ALTER TABLE beers ADD KEY byPriceFrom(price_from)');
        DB::statement('ALTER TABLE beers ADD KEY byPriceTo(price_to)');
        DB::statement('ALTER TABLE beers ADD KEY byBrewer(id_brewer)');
        DB::statement('ALTER TABLE beers ADD KEY byType(type)');



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beers');
    }


}
