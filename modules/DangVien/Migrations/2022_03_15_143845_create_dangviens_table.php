<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangViensTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('dangviens', function(Blueprint $table){
            $table->string('madv',6)->primary();
            $table->string('mavc',6)->nullable();
            $table->string('macb',20)->nullable();
            $table->string('hoten')->nullable();
            $table->timestamp('ngaysinh')->nullable();
            $table->tinyInteger('gioitinh')->default(0);
            $table->timestamp('ngayvaodang')->nullable();
            $table->timestamp('ngaychinhthuc')->nullable();
            $table->string('sodt',20)->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->foreign('macb')->references('macb')->on('chibos')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('dangviens');
    }
}
