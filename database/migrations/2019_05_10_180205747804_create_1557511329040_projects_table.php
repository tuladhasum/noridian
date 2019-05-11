<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557511329040ProjectsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->unsignedInteger('client_id')->nullable();
                $table->foreign('client_id', 'client_fk_48463')->references('id')->on('clients');
                $table->longText('description')->nullable();
                $table->date('start_date')->nullable();
                $table->float('budget', 15, 2)->nullable();
                $table->unsignedInteger('status_id')->nullable();
                $table->foreign('status_id', 'status_fk_48467')->references('id')->on('project_statuses');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
