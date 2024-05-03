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
        Schema::create('stocks', function (Blueprint $table) {
            $table->date('date');
            $table->date('last_change_date');
            $table->char('supplier_article', 100);
            $table->char('tech_size', 100);
            $table->char('barcode', 100);
            $table->unsignedTinyInteger('quantity');
            $table->boolean('is_supply');
            $table->boolean('is_realization');
            $table->unsignedTinyInteger('quantity_full');
            $table->char('warehouse_name', 100);
            $table->boolean('in_way_to_client');
            $table->boolean('in_way_from_client');
            $table->unsignedInteger('nm_id');
            $table->char('subject', 100);
            $table->char('category', 100);
            $table->char('brand', 100);
            $table->char('sc_code', 100);
            $table->unsignedSmallInteger('price');
            $table->unsignedSmallInteger('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
