<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->text('image')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('chat_status')->default('online');
            $table->tinyInteger('status')->default(1)->comment('1->active');
            $table->tinyInteger('is_profile_completed')->default(0)->comment('1->active');
            $table->tinyInteger('loginType')->default(1)->comment('1->simple 2->social login');
            $table->string('device_token')->nullable();
            $table->string('socket_id')->nullable();
            $table->string('back_image')->nullable();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->text('about')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
};
