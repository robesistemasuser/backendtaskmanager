<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keyword_task', function (Blueprint $table) {
        $table->id();
        $table->foreignId('task_id')->constrained()->onDelete('cascade');
        $table->foreignId('keyword_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });

    }

    public function down(): void
    {
        Schema::dropIfExists('keyword_task');
    }
};
