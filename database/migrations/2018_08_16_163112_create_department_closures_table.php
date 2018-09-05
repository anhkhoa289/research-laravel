<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentClosuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_closures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ancestor', false, true);
            $table->bigInteger('descendant', false, true);
            $table->integer('depth');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ancestor')->references('id')->on('departments');
            $table->foreign('descendant')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_closures');
    }
}
