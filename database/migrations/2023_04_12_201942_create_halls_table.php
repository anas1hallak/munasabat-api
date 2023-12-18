<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mobile1')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('mobile3')->nullable();
            $table->string('phone')->nullable();
            $table->string('social_email')->nullable();
            $table->string('address')->nullable();

            $table->string('email')->unique();
            $table->string('password');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};
