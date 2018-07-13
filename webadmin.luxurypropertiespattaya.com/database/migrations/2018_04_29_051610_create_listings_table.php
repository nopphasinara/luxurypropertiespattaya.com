<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->string('refno')->unique()->nullable();
            $table->longText('description')->nullable();
            $table->longText('keywords')->nullable();
            $table->longText('content')->nullable();
            $table->smallInteger('listing_type_id')->nullable();
            $table->smallInteger('location_id')->nullable();
            $table->boolean('for_sale')->default(1)->nullable();
            $table->boolean('for_rent')->default(1)->nullable();
            $table->decimal('sale_price', 11, 2)->nullable();
            $table->decimal('rent_price', 11, 2)->nullable();
            $table->longText('features')->nullable();
            $table->longText('facilities')->nullable();
            $table->longText('image')->nullable();
            $table->longText('gallery')->nullable();
            $table->boolean('featured')->default(0)->nullable();
            $table->boolean('web_visible')->default(1)->nullable();
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
        Schema::dropIfExists('listings');
    }
}
