<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();  // SEO-friendly URL
            $table->text('content')->nullable();
            $table->integer('state_id')->default(1);
            $table->integer('type_id')->nullable(); // 1 = Package
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->timestamp('published_at')->nullable();  // For scheduled posts
            $table->integer('category_id')->nullable();
            $table->integer('created_by_id');
            $table->timestamp('expiry_date')->nullable();
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->index('title');
            $table->index('created_by_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('posts');
    }
};
