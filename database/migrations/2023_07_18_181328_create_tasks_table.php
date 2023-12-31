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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamp('expiration');
            $table->timestamps();

            $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

            $table->foreign('created_by')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
