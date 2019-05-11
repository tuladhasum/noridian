<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557510297842CrmNotesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('crm_notes')) {
            Schema::create('crm_notes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('customer_id')->nullable();
                $table->foreign('customer_id', 'customer_fk_48363')->references('id')->on('crm_customers');
                $table->longText('note')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('crm_notes');
    }
}
