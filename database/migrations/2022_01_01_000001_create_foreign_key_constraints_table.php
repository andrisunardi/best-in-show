<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('display_contests', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('event_images', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('event_videos', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('online_shops', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('pet_shops', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('pets', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->foreign('pet_id')->references('id')->on('pets')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('product_type_id')->references('id')->on('product_types')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('product_types', function (Blueprint $table) {
            $table->foreign('pet_id')->references('id')->on('pets')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('pet_id')->references('id')->on('pets')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('product_type_id')->references('id')->on('product_types')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('promotions', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('sign_ups', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('stores', function (Blueprint $table) {
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
            Schema::table('contacts', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('display_contests', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('event_images', function (Blueprint $table) {
                $table->dropConstrainedForeignId('event_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('event_videos', function (Blueprint $table) {
                $table->dropConstrainedForeignId('event_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('events', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('faqs', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('online_shops', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('pet_shops', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('pets', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('product_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('pet_id');
                $table->dropConstrainedForeignId('product_type_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('product_types', function (Blueprint $table) {
                $table->dropConstrainedForeignId('pet_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('products', function (Blueprint $table) {
                $table->dropConstrainedForeignId('pet_id');
                $table->dropConstrainedForeignId('product_type_id');
                $table->dropConstrainedForeignId('product_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('promotions', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('settings', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('sign_ups', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('sliders', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('stores', function (Blueprint $table) {
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
