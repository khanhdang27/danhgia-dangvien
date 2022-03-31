<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChuaDgsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('chua_kddgs', function (Blueprint $table) {
            $table->integer('madv');
            $table->string('nam', 4);
            $table->tinyInteger('chuakd')->default(0);
            $table->tinyInteger('chuadg')->default(0);
            $table->text('lydo')->nullable();
            $table->timestamps();
            $table->primary(['madv', 'nam']);
            $table->foreign('madv')->references('madv')->on('dangviens')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('nam')->references('nam')->on('nams')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('chua_kddgs');
    }
}
