<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->unsignedInteger('role_id');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });


        DB::table('users')->insert([
            'name'       => 'Administrator',
            'username'   => 'admin',
            'email'      => 'admin@gmail.com',
            'role_id'    => 1,
            'password'   => bcrypt('123456'),
            'created_at' => '2022-03-15 23:30:41',
            'updated_at' => '2022-03-16 22:17:19'
        ]);

        DB::table('users')->insert([
            'name'       => 'Đảng uỷ khoa',
            'username'   => 'danguykhoa',
            'email'      => 'danguykhoa@gmail.com',
            'role_id'    => 2,
            'password'   => bcrypt('123456'),
            'created_at' => '2022-03-15 23:30:42',
            'updated_at' => '2022-03-16 22:17:20'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
}
