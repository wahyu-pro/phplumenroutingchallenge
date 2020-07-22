<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->string('status');
            $table->integer('author_id')->unsigned();
            $table->string('email');
            $table->string('url');
            $table->integer('post_id')->unsigned();
            $table->timestamps();
        });

        // Schema::table('comment', function (Blueprint $table) {
        //     $table->foreign('author_id')->references('id')->on('author');
        //     $table->foreign('post_id')->references('id')->on('post');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
