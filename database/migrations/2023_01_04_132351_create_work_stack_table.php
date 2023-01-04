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
        Schema::create('work_stack', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('work_id');
            $table->unsignedBigInteger('stack_id');
            $table->timestamps();

            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
            $table->foreign('stack_id')->references('id')->on('stacks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_stack');
    }
};
