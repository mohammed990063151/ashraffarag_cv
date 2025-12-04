<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // جدول البيانات الشخصية
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->text('bio');
            $table->string('profile_image')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->timestamps();
        });

        // جدول الخبرة
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('company');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('is_current')->default(false);
            $table->string('icon')->nullable();
            $table->string('color')->default('#17a2b8');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // جدول البورتفوليو
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->string('client');
            $table->date('project_date');
            $table->string('service');
            $table->string('category'); // consulting, finance, marketing
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // جدول المهارات
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('percentage');
            $table->string('icon');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // جدول الجوائز
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('portfolios');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('awards');
    }
};
