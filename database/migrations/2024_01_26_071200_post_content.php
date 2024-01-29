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
        //
        Schema::create('post_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("post_id");
            $table->enum("type",['image','text']);
            $table->text("content");
            $table->unsignedTinyInteger('urutan');
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('post_contents');
    }
};
