<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557511327923ProjectStatusesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('project_statuses')) {
            Schema::create('project_statuses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('project_statuses');
    }
}
