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
        Schema::disableForeignKeyConstraints();
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('category_id')
                ->constrained('categories') // Menyebutkan nama tabel secara eksplisit
                ->onDelete('cascade'); // Menambahkan aturan onDelete
            $table->text('desc');
            $table->string('year');
            $table->text('preview')->nullable();
            $table->text('code')->nullable();
            $table->json('tech')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('gambar')->nullable();
            $table->enum('status', ['Inactive', 'Active']);
            $table->timestamps();
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
