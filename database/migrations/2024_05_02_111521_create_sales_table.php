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
        Schema::create('sales', function (Blueprint $table) {
            $table->char('g_number', 100);
            $table->date('date');
            $table->date('last_change_date');
            $table->char('supplier_article', 100);
            $table->char('tech_size', 100);
            $table->char('barcode', 100);
            $table->smallInteger('total_price');
            $table->tinyInteger('discount_percent');
            $table->boolean('is_supply');
            $table->boolean('is_realization');
            $table->boolean('promo_code_discount')->nullable();
            $table->char('warehouse_name', 100);
            $table->char('country_name', 100);
            $table->char('oblast_okrug_name', 100);
            $table->char('region_name', 100);
            $table->unsignedInteger('income_id');
            $table->char('sale_id', 100);
            $table->unsignedBigInteger('odid')->nullable();
            $table->boolean('spp');
            $table->float('for_pay');
            $table->smallInteger('finished_price');
            $table->float('price_with_disc');
            $table->unsignedBigInteger('nm_id');
            $table->char('subject', 100);
            $table->char('category', 100);
            $table->char('brand', 100);
            $table->boolean('is_storno')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
