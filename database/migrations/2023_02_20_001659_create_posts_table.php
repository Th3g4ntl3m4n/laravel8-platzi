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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            //un post pertenece a un curso
            $table->unsignedBigInteger('course_id');

            $table->string('name');
            //ponemos el booleano para saber si el cursoe s gratis o no
            // por defecto ninguna leccion es gratuita (0) 
            $table->boolean('free')->default(0);
         
            


          

            //Relacion de las tablas
           
      

            $table->foreign('course_id')->references('id')->on('courses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
