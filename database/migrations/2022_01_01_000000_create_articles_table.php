<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique()->nullable();
            $table->string('name_idn', 100)->unique()->nullable();
            $table->text('description')->nullable();
            $table->text('description_idn')->nullable();
            $table->date('date')->nullable();
            $table->string('image', 130)->unique()->nullable();
            $table->string('slug', 100)->unique()->nullable();
            $table->boolean('is_active')->nullable()->unsigned()->default(true);
            $table->foreignId('created_by_id')->nullable()->unsigned();
            $table->foreignId('updated_by_id')->nullable()->unsigned();
            $table->foreignId('deleted_by_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
