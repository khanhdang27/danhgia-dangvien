<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNamsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('nams', function (Blueprint $table) {
            $table->string('nam',4)->primary();
        });

        for ($i = 1930; $i < 2130; $i++)
            DB::table('nams')->insert([
                'nam' => $i,
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('nams');
    }
}
