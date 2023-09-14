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
        Schema::create('combates', function (Blueprint $table) {
            $table->increments('idco');
            $table->integer('no');
            $table->integer('idsol')->unsigned(); 
            $table->integer('municiongas');
            $table->integer('municionsob');
            $table->integer('vida');
            $table->integer('tiempo');
            $table->boolean('activo')->default(1);
            $table->timestamps();
            $table->foreign('idsol')->references('idsol')->on('soldados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combates');
    }
};
