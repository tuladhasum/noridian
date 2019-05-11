<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557511328447ClientsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('clients')) {
            Schema::create('clients', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('company')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('website')->nullable();
                $table->string('skype')->nullable();
                $table->string('country')->nullable();
                $table->unsignedInteger('status_id')->nullable();
                $table->foreign('status_id', 'status_fk_48457')->references('id')->on('client_statuses');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
