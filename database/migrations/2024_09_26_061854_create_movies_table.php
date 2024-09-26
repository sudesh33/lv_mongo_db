<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $collection) {
            $collection->index('title'); // Optional: create an index on title
            $collection->string('title');
            $collection->integer('year');
            $collection->integer('runtime');
            $collection->json('imdb'); // This column will store a JSON array
            $collection->text('plot'); // Can use text for longer content
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
