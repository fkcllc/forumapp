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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('company_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('role')->nullable();
            $table->string('position')->nullable();
            $table->string('address')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->date('last_date')->nullable();

            $table->integer('number_of_vacancy')->nullable();
            $table->integer('experience')->nullable();
            $table->string('gender')->nullable();
            $table->decimal('salary', 10, 2)->nullable();

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
        Schema::dropIfExists('jobs');
    }
};
