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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nid');
            $table->char('emer');
            $table->char('mbiemer');
            $table->double('nota')->nullable();
            $table->string('profesioni')->nullable();
            $table->string('info')->nullable();
            $table->string('lendet')->nullable();
            $table->char('fjalekalimi')->default('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
