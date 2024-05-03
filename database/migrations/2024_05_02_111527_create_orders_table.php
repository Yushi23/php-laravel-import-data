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
        Schema::create('orders', function (Blueprint $table) {
            $table->char('g_number', 100);
            $table->date('date');
            $table->date('last_change_date');
            $table->char('supplier_article', 100);
            $table->char('tech_size', 100);
            $table->char('barcode', 100);
            $table->float('total_price');
            $table->unsignedTinyInteger('discount_percent');
            $table->char('warehouse_name', 100);
            $table->char('oblast', 100);
            $table->unsignedInteger('income_id');
            $table->unsignedBigInteger('odid')->nullable();
            $table->unsignedInteger('nm_id');
            $table->char('subject', 100);
            $table->char('category', 100);
            $table->char('brand', 100);
            $table->boolean('is_cancel');
            $table->date('cancel_dt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
