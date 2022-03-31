<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDgdvsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('dgdvs', function(Blueprint $table){
            $table->integer('madv');
            $table->string('nam', 4);
            $table->string('txl',10)->nullable();
            $table->string('cqxl',10)->nullable();
            $table->string('cuxl',10)->nullable();
            $table->string('cbxl',10)->nullable();
            $table->string('dtxl',10)->nullable();
            $table->string('duk',10)->nullable();
            $table->string('dut',10)->nullable();
            $table->timestamps();
            $table->primary(['madv', 'nam']);
            $table->foreign('madv')->references('madv')->on('dangviens')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('nam')->references('nam')->on('nams')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('txl')->references('maxeploai')->on('xeploais')->nullOnDelete()->nullOnDelete();
            $table->foreign('cqxl')->references('maxeploai')->on('xeploais')->nullOnDelete()->nullOnDelete();
            $table->foreign('cuxl')->references('maxeploai')->on('xeploais')->nullOnDelete()->nullOnDelete();
            $table->foreign('cbxl')->references('maxeploai')->on('xeploais')->nullOnDelete()->nullOnDelete();
            $table->foreign('dtxl')->references('maxeploai')->on('xeploais')->nullOnDelete()->nullOnDelete();
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
        Schema::dropIfExists('dgdvs');
    }
}
