<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->nullable()->unsigned();
            $table->foreignId('product_type_id')->nullable()->unsigned();
            $table->foreignId('product_category_id')->nullable()->unsigned();
            $table->string('name', 100)->nullable();
            $table->string('name_idn', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('description_idn')->nullable();
            $table->string('variant', 100)->nullable();
            $table->string('variant_idn', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->foreignId('weight')->nullable()->unsigned();
            $table->string('color', 100)->nullable();
            $table->string('image', 200)->nullable();
            $table->string('slug', 400)->nullable();
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
        Schema::dropIfExists('products');
    }
};
