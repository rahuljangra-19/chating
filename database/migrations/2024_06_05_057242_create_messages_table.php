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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('message')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1->active 2->deleted');
            $table->tinyInteger('is_deleted')->default(0)->comment('1->deleted');
            $table->tinyInteger('is_read')->default(0)->comment('1->readed');
            $table->tinyInteger('has_media')->default(0)->comment('0->no media 1->has_media');
            $table->dateTimeTz('read_at')->nullable()->comment('read by receiver');
            $table->tinyInteger('message_type')->comment('1-> text 2->media (audio video files ) , 3->location 4->combo of mesage ad media ')->nullable();
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
        Schema::dropIfExists('messages');
    }
};
