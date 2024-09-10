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
        Schema::create('message_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->constrained()->cascadeOnDelete();
            $table->string('file')->nullable();
            $table->string('file_type')->nullable();
            $table->string('file_size')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1->active 2->deleted');
            $table->tinyInteger('is_deleted')->default(0)->comment('1->deleted');
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
        Schema::dropIfExists('message_media');
    }
};
