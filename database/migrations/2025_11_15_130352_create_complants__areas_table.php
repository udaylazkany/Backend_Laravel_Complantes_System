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
        Schema::create('complants__areas', function (Blueprint $table) {
           $table->id();
            $table->foreignId('Complants_id')
            ->constrained('complants')
            ->onDelete('restrict');
            $table->foreignId('Area_id')
            ->constrained('areas')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complants__areas');
    }
};
