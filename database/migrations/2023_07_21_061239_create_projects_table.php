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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name', 255)->unique();
            $table->string('image')->default('');
            $table->string('owner', 255);
            $table->integer('room');
            $table->string('price');
            $table->integer('acreage');
            $table->string('address', 255);
            $table->longText('detail');
            $table->integer('author_id')->default(0);
            $table->integer('type_id')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
