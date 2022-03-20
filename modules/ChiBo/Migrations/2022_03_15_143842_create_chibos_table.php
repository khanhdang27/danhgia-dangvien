<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiBosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chibos', function (Blueprint $table) {
            $table->string('macb',20)->primary();
            $table->string('tencb')->nullable();
            $table->string('madb',20)->nullable();
            $table->foreign('madb')->references('madb')->on('dangbos')->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chibos');
    }
}
