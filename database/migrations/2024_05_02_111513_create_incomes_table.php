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
        Schema::create('incomes', function (Blueprint $table) {
            $table->unsignedInteger('income_id');
            $table->char('number', 100);
            $table->date('date');
            $table->date('last_change_date');
            $table->char('supplier_article', 100);
            $table->char('tech_size', 100);
            $table->char('barcode', 100);
            $table->unsignedSmallInteger('quantity');
            $table->boolean('total_price');
            $table->date('date_close');
            $table->char('warehouse_name', 100);
            $table->unsignedInteger('nm_id');
            $table->char('status', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
};
