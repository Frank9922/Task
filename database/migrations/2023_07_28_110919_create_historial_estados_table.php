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
        Schema::create('historial_estados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('timestamp');
            $table->unsignedBigInteger('estado_anterior_id');
            $table->unsignedBigInteger('estado_actual_id');

            $table->foreign('task_id')
                        ->references('id')
                        ->on('tasks')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

            $table->foreign('estado_anterior_id')
                        ->references('id')
                        ->on('statuses')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

            $table->foreign('estado_actual_id')
                        ->references('id')
                        ->on('statuses')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_estados');
    }
};
