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
        Schema::create('data_files', function (Blueprint $table) {
            $table->id();
           
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('link')->nullable();
            $table->string('id_user')->nullable();
            $table->string('size')->nullable();
            $table->string('extention')->nullable();
            $table->string('id_folder')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('data_files');
    }
};
