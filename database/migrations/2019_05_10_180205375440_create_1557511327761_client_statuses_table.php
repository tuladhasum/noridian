<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557511327761ClientStatusesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('client_statuses')) {
            Schema::create('client_statuses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('client_statuses');
    }
}
