<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('generated_email')->unique();
            $table->string('imap_login')->unique();
            $table->string('imap_password');
            $table->string('imap_host')->default('65.21.136.4');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_ip')->nullable();
            $table->string('password');
            $table->enum('is_active', ['0', '1'])->default('1');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
