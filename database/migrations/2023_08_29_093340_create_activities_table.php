<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('location');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('food');
            $table->double('price');
            $table->integer('max_participants');
            $table->integer('min_participants');
            $table->string('image')->nullable();
            $table->json('needs')->nullable();
            $table->timestamps();
        });

        Schema::create('activity_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
        Schema::dropIfExists('activity_user');
    }
};
