<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        if (env('APP_ENV') != 'testing') {
            Schema::table('settings', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });
        }
    }
};
