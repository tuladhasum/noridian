<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557746255237ExamplesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('examples')) {
            Schema::create('examples', function (Blueprint $table) {
                $table->increments('id');
                $table->string('fullname')->nullable();
                $table->string('email')->nullable();
                $table->longText('notes')->nullable();
                $table->string('secret');
                $table->string('meal_preference');
                $table->boolean('terms_agreement')->default(0);
                $table->integer('no_of_siblings')->nullable();
                $table->float('height', 15, 2)->nullable();
                $table->decimal('expected_salary', 15, 2);
                $table->date('date_of_birth');
                $table->datetime('discharge_date');
                $table->time('time_of_birth');
                $table->unsignedInteger('hospital_id')->nullable();
                $table->foreign('hospital_id', 'hospital_fk_51649')->references('id')->on('hospitals');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('examples');
    }
}
