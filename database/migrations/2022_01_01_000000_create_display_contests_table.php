<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('display_contests', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name', 50)->nullable();
            $table->string('shop_name', 50)->nullable();
            $table->string('shop_address', 200)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('telephone', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('theme_display', 1000)->nullable();
            $table->string('ktp', 16)->nullable();
            $table->string('npwp', 20)->nullable();
            $table->string('photo_1', 30)->nullable();
            $table->string('photo_2', 30)->nullable();
            $table->string('photo_3', 30)->nullable();
            $table->boolean('is_active')->nullable()->unsigned()->default(true);
            $table->foreignId('created_by_id')->nullable()->unsigned();
            $table->foreignId('updated_by_id')->nullable()->unsigned();
            $table->foreignId('deleted_by_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('display_contests');
    }
};
