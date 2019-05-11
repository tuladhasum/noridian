<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557511329465DocumentsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('documents')) {
            Schema::create('documents', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('project_id')->nullable();
                $table->foreign('project_id', 'project_fk_48478')->references('id')->on('projects');
                $table->string('name')->nullable();
                $table->longText('description')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
