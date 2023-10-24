<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('cat')->default(0);
            $table->string('amount')->nullable();
            $table->string('offer')->default(0);
            $table->string('price')->default(0);
            $table->string('status')->default(null);
            $table->string('stock')->default(null);
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
        Schema::dropIfExists('food');
    }
}
