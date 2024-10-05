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
        Schema::create('alokases', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('alokases');
    }
};
