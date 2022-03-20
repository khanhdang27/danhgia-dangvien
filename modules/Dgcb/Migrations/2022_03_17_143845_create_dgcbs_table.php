<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDgcbsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('dgcbs', function(Blueprint $table){
            $table->string('macb', 20);
            $table->string('nam', 4);
            $table->string('txl',10)->nullable();
            $table->string('duk',10)->nullable();
            $table->string('dut',10)->nullable();
            $table->timestamps();
            $table->primary(['macb', 'nam']);
            $table->foreign('macb')->references('macb')->on('chibos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('nam')->references('nam')->on('nams')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('txl')->references('maxeploai')->on('xeploais')->nullOnDelete()->nullOnDelete();
            $table->foreign('duk')->references('maxeploai')->on('xeploais')->nullOnDelete()->nullOnDelete();
            $table->foreign('dut')->references('maxeploai')->on('xeploais')->nullOnDelete()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('dgcbs');
    }
}
