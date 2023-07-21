<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()

    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('province_id');
            $table->string('city');
            $table->string('type');
            $table->string('postal_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
