<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesectionsTable extends Migration
{
    public function up()
    {
        Schema::create('pagesections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('heading');
            $table->text('content')->nullable(); // Assuming content might be optional
            $table->boolean('status')->default(true);
            $table->string('background_image')->nullable(); // File path
            $table->string('background_color')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagesections');
    }
}
