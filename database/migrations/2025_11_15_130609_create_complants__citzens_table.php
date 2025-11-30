<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complants__citzens', function (Blueprint $table) {
             $table->id();
            $table->foreignId('citizen_id')
            ->constrained('citizens')
            ->onDelete('restrict');
            $table->foreignId('Complants_id')
            ->constrained('complants')
            ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complants__citzens');
    }
};
