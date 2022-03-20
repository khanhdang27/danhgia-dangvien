<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('roles')->insert([
            'name'        => 'Administrator',
            'created_at'  => formatDate(time(), 'Y-m-d H:i:s'),
            'updated_at'  => formatDate(time(), 'Y-m-d H:i:s')
        ]);
        DB::table('roles')->insert([
            'name'        => 'Đảng uỷ Khoa',
            'created_at'  => formatDate(time(), 'Y-m-d H:i:s'),
            'updated_at'  => formatDate(time(), 'Y-m-d H:i:s')
        ]);
        DB::table('roles')->insert([
            'name'        => 'Chi bộ',
            'created_at'  => formatDate(time(), 'Y-m-d H:i:s'),
            'updated_at'  => formatDate(time(), 'Y-m-d H:i:s')
        ]);
        DB::table('roles')->insert([
            'name'        => 'Đảng viên',
            'created_at'  => formatDate(time(), 'Y-m-d H:i:s'),
            'updated_at'  => formatDate(time(), 'Y-m-d H:i:s')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
