<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1557511154118ProductProductTagPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('product_product_tag')) {
            Schema::create('product_product_tag', function (Blueprint $table) {
                $table->unsignedInteger('product_id');
                $table->foreign('product_id', 'product_id_fk_48415')->references('id')->on('products');
                $table->unsignedInteger('product_tag_id');
                $table->foreign('product_tag_id', 'product_tag_id_fk_48415')->references('id')->on('product_tags');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('product_product_tag');
    }
}
