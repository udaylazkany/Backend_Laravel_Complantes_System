<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('complants', function (Blueprint $table) {
            $table->id();
            $table->string('name_Complants')->nullable();
            $table->string('description', 100);
            $table->string('file_Path')->nullable(true);   
            $table->string('image_Path')->nullable(true);
            $table->foreignId('department_id')
            ->constrained('departments')   
            ->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('complants');
    }
};
