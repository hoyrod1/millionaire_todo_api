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
            Schema::create('todos', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('user_email');
                $table->string('todo');
                $table->timestamp('completed_at')->nullable();
                $table->boolean('completed')->default(false);
                $table->foreign('user_email')->references('email')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('todos');
    }
};
