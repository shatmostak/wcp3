<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('item', 1020)->nullable();
            $table->string('item_code');
            $table->string('item_code_2')->nullable();
            $table->integer('quantity')->default(1);
            $table->decimal('item_cost', 13, 2);
            $table->string('cost_type')->default('EA');
            $table->decimal('unit_cost', 9, 2)->nullable();
            $table->decimal('extra_cost_2', 9, 2)->nullable();
            $table->decimal('extra_cost_3', 9, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costs');
    }
}
