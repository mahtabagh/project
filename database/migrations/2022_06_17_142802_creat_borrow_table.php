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
        Schema::create('borrows', function (Blueprint $table) {

            $table->id();
            $table->datetime('user_borrowed_at')->nullable();
            $table->datetime('user_refunds_at')->nullable();
            $table->integer('answer')->default(0);

            $table->biginteger('user_id')->unsigned();
            $table->biginteger('book_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('book_id')->references('id')->on('books')->cascadeOnDelete();
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
        //
    }
};